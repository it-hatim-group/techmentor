<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name'     => 'required|string|min:3|max:255',
                'email'    => 'required|email|unique:users,email|max:255',
                'password' => 'required|confirmed|min:6',
                'roles'    => 'nullable|array',
                'roles.*'  => 'exists:roles,id',
            ]);

            $user = User::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            if ($request->filled('roles')) {
                $roleNames = Role::whereIn('id', $request->input('roles'))->pluck('name')->toArray();
                $user->assignRole($roleNames);
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating user: ' . $e->getMessage(), [
                'exception' => $e,
                'request'   => $request->all(),
            ]);
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'name'  => 'required|string|min:3|max:255|unique:users,name,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'roles' => 'nullable|array',
                'roles.*' => 'exists:roles,id',
            ]);

            $user->update([
                'name'  => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            if ($request->has('roles')) {
                $user->roles()->sync($request->roles);
            } else {
                $user->roles()->sync([]);
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating user with ID ' . $id . ': ' . $e->getMessage(), [
                'exception' => $e,
                'request'   => $request->all(),
            ]);
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function updateProfileBasicInformation(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $request->validate([
                'name'  => 'required|string|min:3|max:255|unique:users,name,' . $id,
                'phone' => 'nullable|string|max:20',
            ]);

            $data = [
                'name'  => $request->name,
                'phone' => $request->phone,
            ];

            $user->update($data);
            DB::commit();
            return back()->with('success', 'Profile updated successfully.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Profile update error for user ID ' . $id . ': ' . $e->getMessage(), [
                'exception' => $e,
                'request'   => $request->all(),
            ]);
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function updateProfileImage(Request $request)
    {
        $user = $request->user();
        DB::beginTransaction();
        try {
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            ]);

            if (!$request->hasFile('profile_picture')) {
                return redirect()->back()->with('error', 'No profile picture uploaded.');
            }

            $file = $request->file('profile_picture');
            $extension = strtolower($file->getClientOriginalExtension());

            $uploadPath = public_path('uploads/profile_pictures');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $fileName = date('YmdHis') . '_' . rand(1000, 9999) . '.' . $extension;
            $destination = $uploadPath . '/' . $fileName;

            // Create image resource
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                    $image = imagecreatefromjpeg($file);
                    break;

                case 'png':
                    $image = imagecreatefrompng($file);
                    break;

                case 'gif':
                    $image = imagecreatefromgif($file);
                    break;

                default:
                    $image = imagecreatefromjpeg($file);
                    break;
            }

            // Original size
            $width = imagesx($image);
            $height = imagesy($image);

            // Resize (max width 300px)
            $newWidth = 300;
            $newHeight = intval(($height / $width) * $newWidth);

            // Create new image
            $newImage = imagecreatetruecolor($newWidth, $newHeight);

            // Preserve transparency for PNG
            if ($extension == 'png') {
                imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
                imagealphablending($newImage, false);
                imagesavealpha($newImage, true);
            }

            // Resize copy
            imagecopyresampled(
                $newImage,
                $image,
                0,
                0,
                0,
                0,
                $newWidth,
                $newHeight,
                $width,
                $height
            );

            // Save compressed image
            if ($extension == 'png') {
                imagepng($newImage, $destination, 6);
            } else {
                imagejpeg($newImage, $destination, 75);
            }

            // Free memory
            imagedestroy($image);
            imagedestroy($newImage);

            // Save to DB
            $user->profile_picture = 'uploads/profile_pictures/' . $fileName;
            $user->save();
            DB::commit();

            return redirect()->back()->with('success', 'Profile picture updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Profile image upload error: ' . $e->getMessage(), [
                'user_id' => $user->id ?? null,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->roles()->sync([]);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting user with ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'An error occurred while deleting the user.');
        }
    }
}
