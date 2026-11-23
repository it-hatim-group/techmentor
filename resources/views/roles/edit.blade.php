@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Role
                        </li>
                    </ol>
                </nav>
            </div>
            @can('Show role list')
            <div class="ms-auto">
                <a href="{{ route('roles.index') }}" class="btn btn-primary px-3">
                    <i class="fadeIn animated bx bx-list-ul"></i> Role List
                </a>
            </div>
            @endcan
        </div>
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Role</h5>
                <form action="{{ route('roles.update', $role->id) }}" 
                      method="POST" 
                      class="row g-3">
                    @csrf
                    @method('PUT')

                    {{-- Role Name --}}
                    <div class="col-md-12">
                        <label for="name" class="form-label">Role Name</label>
                        <input 
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Role Name"
                            value="{{ old('name', $role->name) }}"
                        >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Permissions --}}
                    <div class="col-md-12">
                        <label for="permissions" class="form-label">
                            <span style="font-weight: bold;">Select Permissions</span>
                        </label>

                        {{-- Select / Deselect All Checkbox --}}
                        <div class="form-check mb-2">
                            <input type="checkbox" id="selectAll" class="form-check-input" 
                                @if($permissions->count() === $hasPermissions->count()) checked @endif
                            >
                            <label for="selectAll" class="form-check-label">
                                <span style="font-weight: bold;">Select / Deselect All</span>
                            </label>
                        </div>

                        <div class="row">
                            @if ($permissions->isNotEmpty())
                                @foreach($permissions as $permission)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input 
                                                type="checkbox"
                                                name="permissions[]"
                                                class="form-check-input permission-checkbox"
                                                id="permission-{{ $permission->id }}"
                                                value="{{ $permission->name }}"
                                                @if(in_array($permission->name, $hasPermissions->toArray())) checked @endif
                                            >
                                            <label 
                                                for="permission-{{ $permission->id }}"
                                                class="form-check-label"
                                            >
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No permissions available.</p>
                                </div>
                            @endif
                        </div>
                        @error('permissions')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">
                                Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for Select / Deselect All --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

    // Toggle all permissions when "Select / Deselect All" is clicked
    selectAllCheckbox.addEventListener('change', function() {
        permissionCheckboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Update "Select All" checkbox if any individual permission changes
    permissionCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            selectAllCheckbox.checked = Array.from(permissionCheckboxes).every(cb => cb.checked);
        });
    });
});
</script>
@endsection