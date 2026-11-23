@extends('layouts.app')
@section('content')
    @include('message')
    <style>
        .organization-card .card-header {
            padding: 10px 14px;
        }

        .organization-card .row {
            --bs-gutter-y: 8px;
            --bs-gutter-x: 10px;
        }

        .organization-card .form-control {
            height: 32px;
            min-height: 32px;
            padding: 4px 9px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        .organization-card .btn {
            height: 30px;
            padding: 4px 12px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        /* Compact table */
        .organization-card .card-body {
            padding: 12px 14px;
        }

        .organization-card .table {
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.3;
        }

        .organization-card .table th,
        .organization-card .table td {
            padding: 6px 8px;
            vertical-align: middle;
        }

        .organization-card .table th {
            font-weight: 600;
            white-space: nowrap;
        }

        .organization-card .table td {
            line-height: 1.3;
        }

        .organization-card .table td strong {
            font-weight: 600;
        }

        .organization-card .table .btn {
            width: 28px;
            height: 26px;
            padding: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .organization-card .pagination {
            margin-bottom: 0;
            font-size: 12px;
        }

        .organization-card .pagination .page-link {
            padding: 4px 9px;
            font-size: 12px;
        }

        .organization-card .empty-row td {
            padding: 12px !important;
        }
    </style>

    <div class="card organization-card">

        <div class="card-header">
            <form action="{{ route('organization.index') }}" method="GET" class="mb-0">
                <div class="row g-2">

                    <div class="col-md-3">
                        <input type="text" name="full_name" class="form-control" placeholder="Search contact person"
                            value="{{ request('full_name') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control" placeholder="Search email"
                            value="{{ request('email') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="phone" class="form-control" placeholder="Search mobile number"
                            value="{{ request('phone') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="organization_name" class="form-control"
                            placeholder="Search organization" value="{{ request('organization_name') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>

                    <div class="col-md-6 d-flex align-items-center gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="lni lni-search-alt"></i> Filter
                        </button>

                        <a href="{{ route('organization.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Contact Person</th>
                            <th>Business Email</th>
                            <th>Mobile Number</th>
                            <th>Organization Name</th>
                            <th>Requirements</th>
                            <th>Registered Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($organizations as $key => $organization)
                            <tr>
                                <td>
                                    {{ $organizations->firstItem() + $key }}
                                </td>

                                <td>
                                    <strong>{{ $organization->full_name }}</strong>
                                </td>

                                <td>{{ $organization->email }}</td>

                                <td>{{ $organization->phone }}</td>

                                <td>{{ $organization->organization_name }}</td>

                                <td style="min-width: 220px; max-width: 300px;">
                                    {{ $organization->requirements }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $organization->created_at->format('d M, Y') }}
                                </td>

                                <td class="text-center">
                                    <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this organization?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn">
                                            <i class="lni lni-trash text-danger"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr class="empty-row">
                                <td colspan="8" class="text-center">
                                    <span class="text-muted">
                                        No organizations registered yet.
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div>
                {{ $organizations->links() }}
            </div>

        </div>
    </div>
@endsection
