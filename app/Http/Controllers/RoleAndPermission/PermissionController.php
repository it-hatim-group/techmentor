<?php

namespace App\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Throwable;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $guardName = config('auth.defaults.guard', 'web');

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('permissions', 'name')
                    ->where(fn ($query) => $query->where(
                        'guard_name',
                        $guardName
                    )),
            ],
        ]);

        try {
            DB::transaction(function () use ($validated, $guardName) {
                Permission::create([
                    'name' => $validated['name'],
                    'guard_name' => $guardName,
                ]);
            });

            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission created successfully.');
        } catch (Throwable $e) {
            Log::error('Error creating permission.', [
                'message' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Unable to create permission. Please try again.');
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('permissions', 'name')
                    ->where(fn ($query) => $query->where(
                        'guard_name',
                        $permission->guard_name
                    ))
                    ->ignore($permission->id),
            ],
        ]);

        try {
            DB::transaction(function () use ($permission, $validated) {
                $permission->update([
                    'name' => $validated['name'],
                ]);
            });

            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission updated successfully.');
        } catch (Throwable $e) {
            Log::error('Error updating permission.', [
                'permission_id' => $permission->id,
                'message' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Unable to update permission. Please try again.');
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        try {
            DB::transaction(function () use ($permission) {
                $permission->delete();
            });

            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission deleted successfully.');
        } catch (Throwable $e) {
            Log::error('Error deleting permission.', [
                'permission_id' => $permission->id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('permissions.index')
                ->with('error', 'Unable to delete permission. Please try again.');
        }
    }
}