@extends('layouts.app')
@push('css')
@endpush
@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create User
                        </li>
                    </ol>
                </nav>
            </div>
            @can('Show user list')
            <div class="ms-auto">
                <a href="{{ route('users.index') }}" class="btn btn-primary px-3">
                <i class="fadeIn animated bx bx-list-ul"></i> User List
                </a>
            </div>
            @endcan
        </div>
        {{-- Flash messages --}}
        @include('message')
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Create User</h5>
                <form action="{{ route('users.store') }}" method="POST" class="row g-3">
                    @csrf
                    {{-- Name --}}
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name"
                            value="{{ old('name') }}"
                        >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Email --}}
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password"
                        >
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Confirm Password --}}
                    <div class="col-md-12">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirm Password"
                        >
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Assign Roles --}}
                    <div class="col-md-12">
                        <label for="roles" class="form-label">
                            <span style="font-weight: bold;">Assign Roles</span>
                        </label>

                        {{-- Select / Deselect All Checkbox --}}
                        @if ($roles->isNotEmpty())
                        <div class="form-check mb-2">
                            <input type="checkbox" id="selectAllRoles" class="form-check-input">
                            <label for="selectAllRoles" class="form-check-label">
                                <span style="font-weight: bold;">Select / Deselect All</span>
                            </label>
                        </div>
                        @endif

                        <div class="row">
                            @if ($roles->isNotEmpty())
                                @foreach($roles as $role)
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                name="roles[]" 
                                                class="form-check-input role-checkbox"
                                                id="role-{{ $role->id }}" 
                                                value="{{ $role->id }}"
                                                {{ (is_array(old('roles')) && in_array($role->id, old('roles'))) ? 'checked' : '' }}
                                            >
                                            <label for="role-{{ $role->id }}" class="form-check-label">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @error('roles')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Submit Button --}}
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllRoles = document.getElementById('selectAllRoles');
    const roleCheckboxes = document.querySelectorAll('.role-checkbox');

    // Toggle all roles when master checkbox is clicked
    if (selectAllRoles) {
        selectAllRoles.addEventListener('change', function() {
            roleCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllRoles.checked;
            });
        });

        // Update master checkbox if all individual checkboxes are checked/unchecked
        roleCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                selectAllRoles.checked = Array.from(roleCheckboxes).every(cb => cb.checked);
            });
        });

        // Pre-check master checkbox if all roles are already selected (old input)
        if (Array.from(roleCheckboxes).every(cb => cb.checked)) {
            selectAllRoles.checked = true;
        }
    }
});
</script>
@endpush