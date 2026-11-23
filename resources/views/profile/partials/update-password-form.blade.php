<section>

    <style>
        .form-control-sm {
            padding: 0.25rem 0.5rem;
        }

        label {
            margin-bottom: 0.25rem;
        }

        .form-group {
            margin-bottom: 0.75rem;
        }
    </style>

    <header class="mb-3">
        <h2 class="h6 fw-bold mb-1">
            <i class="bi bi-shield-lock text-success"></i>
            {{ __('Update Password') }}
        </h2>
        <p class="text-muted small mb-0">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
        <div style="margin-bottom: -10px;">
            @if (session('status') === 'password-updated')
                <span id="passwordSavedMessage" class="text-success small">
                    {{ __('Password updated successfully!') }}
                </span>
            @endif
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="row">

            <!-- Current Password -->
            <div class="col-md-4 form-group">
                <label for="update_password_current_password" class="fw-semibold small">
                    {{ __('Current Password') }}
                </label>

                <input type="password" name="current_password" id="update_password_current_password"
                    class="form-control form-control-sm @if ($errors->updatePassword->get('current_password')) is-invalid @endif"
                    autocomplete="current-password">

                @if ($errors->updatePassword->get('current_password'))
                    <div class="invalid-feedback d-block small">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif
            </div>

            <!-- New Password -->
            <div class="col-md-4 form-group">
                <label for="update_password_password" class="fw-semibold small">
                    {{ __('New Password') }}
                </label>

                <input type="password" name="password" id="update_password_password"
                    class="form-control form-control-sm @if ($errors->updatePassword->get('password')) is-invalid @endif"
                    autocomplete="new-password">

                @if ($errors->updatePassword->get('password'))
                    <div class="invalid-feedback d-block small">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="col-md-4 form-group">
                <label for="update_password_password_confirmation" class="fw-semibold small">
                    {{ __('Confirm Password') }}
                </label>

                <input type="password" name="password_confirmation" id="update_password_password_confirmation"
                    class="form-control form-control-sm @if ($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                    autocomplete="new-password">

                @if ($errors->updatePassword->get('password_confirmation'))
                    <div class="invalid-feedback d-block small">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </div>
                @endif
            </div>

        </div>

        <!-- Status + Button -->
        <div class="d-flex justify-content-between align-items-center">
            <div class=""></div>
            <button type="submit" class="btn btn-primary btn-sm px-4">
                {{ __('Update') }}
            </button>
        </div>
    </form>
</section>
