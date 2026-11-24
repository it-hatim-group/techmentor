@extends('layouts.app')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Process Steps</h5>
            <a href="{{ route('processSteps.create') }}" class="btn btn-sm btn-primary">
                Add New Step
            </a>
        </div>
        <div class="card-body p-2">
            @if (session('success'))
                <div class="alert alert-success py-2 small mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-hover align-middle small mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Step Number</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th width="140">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($processSteps as $key => $step)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $step->step_number }}</td>
                                <td>{{ $step->title }}</td>
                                <td>{{ $step->description }}</td>
                                <td>{{ $step->sort_order }}</td>
                                <td>
                                    {{ $step->status ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <a href="{{ route('processSteps.edit', $step->id) }}"
                                        class="btn btn-sm btn-info py-0 px-2">
                                        Edit
                                    </a>
                                    <form action="{{ route('processSteps.destroy', $step->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger py-0 px-2"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">
                                    No process steps found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
