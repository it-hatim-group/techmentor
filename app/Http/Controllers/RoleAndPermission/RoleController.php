<?php

namespace App\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name'           => 'required|string|min:3|unique:roles,name|max:255',
                'permissions'    => 'required|array',
                'permissions.*'  => 'exists:permissions,name',
            ]);

            $role = Role::create([
                'name' => $request->input('name'),
            ]);

            if (!empty($request->permissions)) {
                foreach ($request->permissions as $name) {
                    $role->givePermissionTo($name);
                }
            }

            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating role: ' . $e->getMessage(), [
                'exception' => $e,
                'request'   => $request->all(),
            ]);
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('roles.edit', compact('role', 'hasPermissions', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $role = Role::findOrFail($id);
            $request->validate([
                'name'           => 'required|string|min:3|max:255|unique:roles,name,' . $id,
                'permissions'    => 'nullable|array',
                'permissions.*'  => 'exists:permissions,name',
            ]);

            $role->update([
                'name' => $request->input('name'),
            ]);

            $role->syncPermissions($request->permissions ?: []);

            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
        } catch (ValidationException $e) {

            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating role with ID ' . $id . ': ' . $e->getMessage(), [
                'exception' => $e,
                'request'   => $request->all(),
            ]);
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->syncPermissions([]);
            $role->delete();

            return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting role with ID ' . $id . ': ' . $e->getMessage(), [
                'exception' => $e,
            ]);
            return redirect()->route('roles.index')->with('error', 'An error occurred while deleting the role.');
        }
    }
}
