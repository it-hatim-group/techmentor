<section>
    <style>
        .form-control-sm {
            padding: 0.25rem 0.5rem;
        }

        label {
            margin-bottom: 0;
        }
    </style>

    <header class="mb-2">
        <h2 class="h6 fw-bold mb-1">
            <i class="bi bi-person-circle text-primary"></i>
            {{ __('Update Name & Email') }}
        </h2>
        <p class="text-muted small mb-0">
            {{ __('Update Name & Email address.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-2">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="row mb-2 align-items-center">
            <label for="name" class="col-md-3 col-form-label fw-semibold small">
                {{ __('Name') }}
            </label>

            <div class="col-md-9">
                <input type="text"
                       class="form-control form-control-sm @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       required
                       autofocus
                       autocomplete="name">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="row mb-2 align-items-center">
            <label for="email" class="col-md-3 col-form-label fw-semibold small">
                {{ __('Email') }}
            </label>

            <div class="col-md-9">
                <input type="email"
                       class="form-control form-control-sm @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       required
                       autocomplete="username">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Phone -->
        <div class="row mb-2 align-items-center">
            <label for="phone" class="col-md-3 col-form-label fw-semibold small">
                {{ __('Phone') }}
            </label>

            <div class="col-md-9">
                <input type="text"
                       class="form-control form-control-sm @error('phone') is-invalid @enderror"
                       id="phone"
                       name="phone"
                       value="{{ old('phone', $user->phone) }}"
                       autocomplete="tel">

                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Status -->
        <div class="text-end">
            @if (session('status') === 'profile-updated')
                <span class="text-success small">
                    {{ __('Updated!') }}
                </span>
            @endif
        </div>

        <!-- Button -->
        <div class="row mt-1">
            <div class="col-md-9 offset-md-3 text-end">
                <button type="submit" class="btn btn-primary btn-sm px-3 py-1">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</section>