@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatable/buttons.bootstrap5.min.css') }}">
    <style>
        .chip {
            display: inline-block;
            padding: 3px 6px;
            margin: 2px;
            background-color: #f1f1f1;
            border-radius: 15px;
            font-size: 12px;
            line-height: normal;
            padding-bottom: 0px !important;
            height: 20px;
        }
    </style>
@endpush

@section('content')
    @include('message')

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
                        Roles
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('roles.create') }}" class="btn btn-primary px-3">
                <i class="lni lni-circle-plus"></i> Add Role
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped mb-0" id="rolesDataTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td style="max-width: 200px; word-wrap: break-word; white-space: normal;">
                                @foreach ($role->permissions as $permission)
                                    <div class="chip">
                                        {{ $permission->name }}
                                    </div>
                                @endforeach
                            </td>
                            <td>{{ $role->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $role->updated_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center align-items-center">

                                    {{-- Edit --}}
                                    <a href="{{ route('roles.edit', $role->id) }}" title="Edit">
                                        <i class="fadeIn animated bx bx-message-alt-edit" style="font-size: 18px;"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this role?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete">
                                            <i class="fadeIn animated bx bx-trash" style="font-size: 18px;"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/datatable/3.6.0_jquery.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/buttons.print.min.js') }}"></script>
@endpush
