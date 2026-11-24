@extends('layouts.app')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Process Step</h5>
            <a href="{{ route('processSteps.index') }}" class="btn btn-sm btn-secondary">
                <i class="fadeIn animated bx bx-arrow-back"></i> Back
            </a>
        </div>
        <div class="card-body p-3">
            <form action="{{ route('processSteps.update', $processStep->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold mb-1">Step Number</label>
                        <input type="text" name="step_number"
                            class="form-control form-control-sm @error('step_number') is-invalid @enderror"
                            placeholder="STEP 01" value="{{ old('step_number', $processStep->step_number) }}">
                        @error('step_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold mb-1">Title</label>
                        <input type="text" name="title"
                            class="form-control form-control-sm @error('title') is-invalid @enderror"
                            value="{{ old('title', $processStep->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="form-label small fw-semibold mb-1">Description</label>
                        <textarea name="description" rows="2" class="form-control form-control-sm">{{ old('description', $processStep->description) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold mb-1">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control form-control-sm"
                            value="{{ old('sort_order', $processStep->sort_order) }}">
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <div class="form-check mb-1">
                            <input type="checkbox" name="status" value="1" class="form-check-input" id="status"
                                {{ old('status', $processStep->status) ? 'checked' : '' }}>
                            <label class="form-check-label small fw-semibold" for="status">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-sm btn-primary px-3">
                        <i class="bi bi-check-lg"></i> Update Step
                    </button>
                    <a href="{{ route('processSteps.index') }}" class="btn btn-sm btn-light border px-3">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
