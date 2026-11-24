@extends('layouts.app')
@section('content')
    @include('message')
    <style>
        .contact-card .card-header {
            padding: 10px 14px;
        }

        .contact-card .row {
            --bs-gutter-y: 8px;
            --bs-gutter-x: 10px;
        }

        .contact-card .form-control {
            height: 32px;
            min-height: 32px;
            padding: 4px 9px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        .contact-card .btn {
            height: 30px;
            padding: 4px 12px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 4px;
        }

        .contact-card .card-body {
            padding: 12px 14px;
        }

        .contact-card .table {
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.3;
        }

        .contact-card .table th,
        .contact-card .table td {
            padding: 6px 8px;
            vertical-align: middle;
        }

        .contact-card .table th {
            font-weight: 600;
            white-space: nowrap;
        }

        .contact-card .table td strong {
            font-weight: 600;
        }

        .contact-card .table .btn {
            width: 28px;
            height: 26px;
            padding: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .contact-card .pagination {
            margin-bottom: 0;
            font-size: 12px;
        }

        .contact-card .pagination .page-link {
            padding: 4px 9px;
            font-size: 12px;
        }

        .contact-card .empty-row td {
            padding: 12px !important;
        }
    </style>
    <div class="card contact-card">
        {{-- Search Filters --}}
        <div class="card-header">
            <form action="{{ route('contact.index') }}" method="GET" class="mb-0">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="Search name"
                            value="{{ request('name') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control" placeholder="Search email"
                            value="{{ request('email') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="interest" class="form-control" placeholder="Search interest"
                            value="{{ request('interest') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="message" class="form-control" placeholder="Search message"
                            value="{{ request('message') }}">
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
                        <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
        {{-- Contact List --}}
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Contact Enquiry List</h6>
                <span class="badge bg-primary">
                    Total Contacts: {{ $contacts->total() }}
                </span>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Interest</th>
                            <th>Message</th>
                            <th>Registered Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $key => $contact)
                            <tr>
                                <td>
                                    {{ $contacts->firstItem() + $key }}
                                </td>
                                <td>
                                    <strong>{{ $contact->name }}</strong>
                                </td>
                                <td>
                                    {{ $contact->email }}
                                </td>
                                <td>
                                    {{ $contact->interest }}
                                </td>
                                <td style="min-width:200px;max-width:350px;">
                                    {{ $contact->message ?? 'N/A' }}
                                </td>
                                <td class="text-nowrap">
                                    {{ $contact->created_at->format('d M, Y') }}
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this contact enquiry?')">
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
                                <td colspan="7" class="text-center">
                                    <span class="text-muted">
                                        No contact enquiries found.
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
