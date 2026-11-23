@extends('layouts.app')

@section('content')
    @include('message')

    <style>
        .mentor-card .card-header {
            padding: 10px 14px;
        }

        .mentor-card .row {
            --bs-gutter-y: 8px;
            --bs-gutter-x: 10px;
        }

        .mentor-card .form-control {
            height: 32px;
            min-height: 32px;
            padding: 4px 9px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        .mentor-card .btn {
            height: 30px;
            padding: 4px 12px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        /* Compact table */
        .mentor-card .card-body {
            padding: 12px 14px;
        }

        .mentor-card .table {
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.3;
        }

        .mentor-card .table th,
        .mentor-card .table td {
            padding: 6px 8px;
            vertical-align: middle;
        }

        .mentor-card .table th {
            font-weight: 600;
            white-space: nowrap;
        }

        .mentor-card .table td {
            line-height: 1.3;
        }

        .mentor-card .table td strong {
            font-weight: 600;
        }

        .mentor-card .table .btn {
            width: 28px;
            height: 26px;
            padding: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .mentor-card .pagination {
            margin-bottom: 0;
            font-size: 12px;
        }

        .mentor-card .pagination .page-link {
            padding: 4px 9px;
            font-size: 12px;
        }

        .mentor-card .empty-row td {
            padding: 12px !important;
        }
    </style>

    <div class="card mentor-card">

        <div class="card-header">

            <form action="{{ route('mentor.index') }}" method="GET" class="mb-0">

                <div class="row g-2">

                    <div class="col-md-3">
                        <input type="text" name="full_name" class="form-control" placeholder="Search full name"
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
                        <input type="text" name="expertise" class="form-control" placeholder="Search expertise"
                            value="{{ request('expertise') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="experience" class="form-control" placeholder="Search experience"
                            value="{{ request('experience') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-center gap-2">

                        <button type="submit" class="btn btn-primary">
                            <i class="lni lni-search-alt"></i> Filter
                        </button>

                        <a href="{{ route('mentor.index') }}" class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Mentor List</h6>

                <span class="badge bg-primary">
                    Total Mentors: {{ $mentors->total() }}
                </span>
            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Expertise</th>
                            <th>Experience</th>
                            <th>Registered Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($mentors as $key => $mentor)
                            <tr>

                                <td>
                                    {{ $mentors->firstItem() + $key }}
                                </td>

                                <td>
                                    <strong>{{ $mentor->full_name }}</strong>
                                </td>

                                <td>{{ $mentor->email }}</td>

                                <td>{{ $mentor->phone }}</td>

                                <td>{{ $mentor->expertise }}</td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $mentor->experience }}
                                    </span>
                                </td>

                                <td class="text-nowrap">
                                    {{ $mentor->created_at->format('d M, Y') }}
                                </td>

                                <td class="text-center">

                                    <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this mentor?')">

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
                                        No mentors registered yet.
                                    </span>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div>
                {{ $mentors->links() }}
            </div>

        </div>

    </div>
@endsection
