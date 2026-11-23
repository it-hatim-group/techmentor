<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single {
        height: calc(1.5em + .5rem + 2px);
        display: flex;
        align-items: center;
        position: relative;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
        padding-left: 4px;
        padding-right: 35px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        text-align: left !important;
        padding-right: 30px;
    }

    .select2-container .select2-selection--single {
        display: flex !important;
        align-items: center;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        right: 8px;
    }

    .select2-container--default .select2-selection--single .select2-selection__clear {
        position: absolute;
        right: 28px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        margin-right: 0;
    }

    .select2-container--default .select2-selection--single:focus,
    .select2-container--default.select2-container--focus .select2-selection--single {
        outline: none;
        border-color: #86b7fe;
        box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .15);
    }
</style>

{{-- SUCCESS / ERROR MESSAGES --}}
@if (session('success'))
    <div class="alert alert-success py-1 px-2 mb-2 text-start">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger py-1 px-2 mb-2 text-start">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('profile.updateProfileBasicInformation', auth()->id()) }}">
    @csrf
    @method('PATCH')

    <div class="row gx-2">

        <!-- LEFT SIDE -->
        <div class="col-md-6 border p-3">

            <div class="row mb-2 align-items-left gx-1">
                <label class="col-sm-3 col-form-label text-start"><strong>Name</strong></label>
                <div class="col-sm-9">
                    <input type="text" name="name"
                        class="form-control form-control-sm w-100 @error('name') is-invalid @enderror"
                        value="{{ old('name', auth()->user()->name) }}">

                    @error('name')
                        <small class="text-danger text-start d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>

            <div class="row mb-2 align-items-left gx-1">
                <label class="col-sm-3 col-form-label text-start"><strong>Phone</strong></label>
                <div class="col-sm-9">
                    <input type="text" name="phone"
                        class="form-control form-control-sm w-100 @error('phone') is-invalid @enderror"
                        value="{{ old('phone', auth()->user()->phone) }}">

                    @error('phone')
                        <small class="text-danger text-start d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 border p-3">

            <div class="row mb-2 align-items-left gx-1">
                <label class="col-sm-3 col-form-label text-start">
                    <strong>Email</strong>
                </label>
                <div class="col-sm-9 text-start">
                    <input type="email" class="form-control form-control-sm w-100"
                        value="{{ old('email', auth()->user()->email) }}" readonly>

                    <span class="text-danger fst-italic" style="font-size: 10px;">
                        Cannot be changed
                    </span>
                </div>
            </div>

            <div class="row mb-2 align-items-left gx-1">
                <label class="col-sm-3 col-form-label text-start">
                    <strong>Roles</strong>
                </label>
                <div class="col-sm-9 text-start">
                    <input type="text" class="form-control form-control-sm w-100"
                        value="{{ auth()->user()->roles->pluck('name')->join(', ') }}" readonly>

                    <span class="text-danger fst-italic" style="font-size: 10px;">
                        Cannot be changed
                    </span>
                </div>
            </div>

        </div>
    </div>

    <!-- BUTTON -->
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-sm btn-primary px-4">
            Update
        </button>
    </div>

</form>
