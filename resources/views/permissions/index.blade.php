@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatable/buttons.bootstrap5.min.css') }}">
@endpush

@section('content')
    @include('message')

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Permission</div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('permissions.index') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Permissions
                    </li>
                </ol>
            </nav>
        </div>

        <div class="ms-auto">
            <a href="{{ route('permissions.create') }}" class="btn btn-primary px-3">
                <i class="lni lni-circle-plus"></i> Add Permission
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover mb-0" id="permissionsDataTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at?->format('d-m-Y H:i') ?? '-' }}</td>
                            <td>{{ $permission->updated_at?->format('d-m-Y H:i') ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center align-items-center">
                                    {{-- Edit --}}
                                    <a href="{{ route('permissions.edit', $permission->id) }}" title="Edit">
                                        <i class="bx bx-edit-alt" style="font-size: 18px;"></i>
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete">
                                            <i class="bx bx-trash" style="font-size: 18px;"></i>
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
