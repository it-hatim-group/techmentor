@extends('layouts.app')

@section('content')
    @include('message')

    <style>
        .mentee-card .card-header {
            padding: 10px 14px;
        }

        .mentee-card .row {
            --bs-gutter-y: 8px;
            --bs-gutter-x: 10px;
        }

        .mentee-card .form-control {
            height: 32px;
            min-height: 32px;
            padding: 4px 9px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        .mentee-card .btn {
            height: 30px;
            padding: 4px 12px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        /* Compact table */
        .mentee-card .card-body {
            padding: 12px 14px;
        }

        .mentee-card .table {
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.3;
        }

        .mentee-card .table th,
        .mentee-card .table td {
            padding: 6px 8px;
            vertical-align: middle;
        }

        .mentee-card .table th {
            font-weight: 600;
            white-space: nowrap;
        }

        .mentee-card .table td {
            line-height: 1.3;
        }

        .mentee-card .table td strong {
            font-weight: 600;
        }

        .mentee-card .table .btn {
            width: 28px;
            height: 26px;
            padding: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .mentee-card .pagination {
            margin-bottom: 0;
            font-size: 12px;
        }

        .mentee-card .pagination .page-link {
            padding: 4px 9px;
            font-size: 12px;
        }

        .mentee-card .empty-row td {
            padding: 12px !important;
        }
    </style>

    <div class="card mentee-card">

        <div class="card-header">

            <form action="{{ route('mentee.index') }}" method="GET" class="mb-0">

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
                        <input type="text" name="profession" class="form-control" placeholder="Search profession"
                            value="{{ request('profession') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="goals" class="form-control"
                            placeholder="Search career / learning goals" value="{{ request('goals') }}">
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

                        <a href="{{ route('mentee.index') }}" class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-2">

                <h6 class="mb-0">Mentee List</h6>

                <span class="badge bg-primary">
                    Total Mentees: {{ $mentees->total() }}
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
                            <th>Profession</th>
                            <th>Career / Learning Goals</th>
                            <th>Registered Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($mentees as $key => $mentee)
                            <tr>

                                <td>
                                    {{ $mentees->firstItem() + $key }}
                                </td>

                                <td>
                                    <strong>{{ $mentee->full_name }}</strong>
                                </td>

                                <td>{{ $mentee->email }}</td>

                                <td>{{ $mentee->phone }}</td>

                                <td>
                                    {{ $mentee->profession ?? 'N/A' }}
                                </td>

                                <td style="min-width: 200px; max-width: 300px;">
                                    {{ $mentee->goals }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $mentee->created_at->format('d M, Y') }}
                                </td>

                                <td class="text-center">

                                    <form action="{{ route('mentees.destroy', $mentee->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this mentee?')">

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
                                        No mentees registered yet.
                                    </span>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div>
                {{ $mentees->links() }}
            </div>

        </div>

    </div>
@endsection
