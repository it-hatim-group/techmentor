@php $settings = setting(); @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/icon/' . ($settings?->favicon ?? 'default.png')) }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <title>{{ $settings->favicon_title ?? 'Login' }}</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            min-height: 100dvh;
            background: linear-gradient(135deg, #4658B4 0%, #2f3fa3 100%);
            position: relative;
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.06);
            top: -120px;
            left: -120px;
        }

        body::after {
            width: 350px;
            height: 350px;
            background: rgba(237, 28, 36, 0.12);
            bottom: -120px;
            right: -120px;
        }

        .auth-wrapper {
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px 10px;
            position: relative;
            z-index: 1;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            padding: 18px;
            color: #212529;
        }

        .logo {
            display: block;
            max-width: 120px;
            max-height: 65px;
            width: auto;
            height: auto;
            object-fit: contain;
            margin: 0 auto 8px;
        }

        .title {
            font-weight: 600;
            font-size: 20px;
            line-height: 1.4;
            color: #2f3fa3;
        }

        .subtitle {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #2f3fa3;
            margin-bottom: 5px;
        }

        .form-control {
            height: 40px;
            border-radius: 8px;
            font-size: 13px;
            border: 1.5px solid #dcdcdc;
            padding: 8px 12px;
            color: #212529;
        }

        .form-control:focus {
            border-color: #4658B4;
            box-shadow: 0 0 0 0.12rem rgba(70, 88, 180, 0.2);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            font-size: 12px;
        }

        .password-field {
            padding-right: 38px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 34px;
            cursor: pointer;
            font-size: 18px;
            color: #6c757d;
            line-height: 1;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #4658B4;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 6px;
            min-height: auto;
            padding-left: 0;
            margin: 0;
        }

        .form-check-input {
            float: none;
            margin: 0;
            width: 14px;
            height: 14px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .form-check-input:checked {
            background-color: #4658B4;
            border-color: #4658B4;
        }

        .form-check-label {
            font-size: 12px;
            color: #555;
            cursor: pointer;
            line-height: 1.4;
        }

        .btn-primary {
            height: 40px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            background: linear-gradient(135deg, #4658B4, #ED1C24);
            border: none;
            color: #fff;
            transition: opacity 0.2s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(135deg, #2f3fa3, #d71920);
            color: #fff;
            opacity: 0.95;
        }

        .link {
            color: #1cabed;
            font-size: 13px;
            text-decoration: none;
        }

        .link:hover {
            color: #2f3fa3;
            text-decoration: underline;
        }

        .footer-text {
            font-size: 12px;
            color: #888;
        }

        .auth-footer {
            margin-top: 14px;
            padding-top: 10px;
            border-top: 1px solid #eeeeee;
            color: #888;
            font-size: 11px;
            text-align: center;
        }

        .support-modal .modal-content {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .support-modal .modal-header {
            padding: 12px 16px;
            border-bottom: 1px solid #eee;
        }

        .support-modal .modal-title {
            color: #2f3fa3;
            font-size: 16px;
            font-weight: 600;
        }

        .support-modal .modal-body {
            padding: 16px;
            font-size: 13px;
            color: #555;
        }

        .support-modal .modal-body p {
            margin-bottom: 10px;
        }

        .support-modal .modal-body p:last-child {
            margin-bottom: 0;
        }

        .support-modal .modal-body i {
            color: #4658B4;
            margin-right: 5px;
        }

        @media (max-width: 400px) {
            .auth-card {
                padding: 16px;
            }

            .title {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-wrapper">
        <div class="auth-card">

            {{-- LOGO AND TITLE --}}
            <div class="text-center mb-3">
                <img src="{{ asset('images/logo/' . (optional($settings)->logo ?? 'default.png')) }}" class="logo"
                    alt="Logo" onerror="this.style.display='none';">

                <div class="title">
                    {{ $settings->favicon_title ?? 'Welcome Back' }}
                </div>

                <div class="subtitle">
                    Login to your account
                </div>

            </div>

            {{-- LOGIN FORM --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email"
                        autocomplete="username" required autofocus>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>

                    <input type="password" id="password" name="password"
                        class="form-control password-field @error('password') is-invalid @enderror"
                        placeholder="Enter password" autocomplete="current-password" required>

                    <i class="bx bx-hide password-toggle" role="button" tabindex="0" aria-label="Show password"
                        aria-controls="password" aria-pressed="false"></i>

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>

            @if (!empty($settings->copyright_text))
                <div class="auth-footer">
                    {{ $settings->copyright_text }}
                </div>
            @endif

        </div>
    </div>

    <div class="modal fade support-modal" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title" id="supportModalLabel">
                        <i class="bx bx-support"></i>
                        Contact Support
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <i class="bx bx-envelope"></i>
                        <strong>Email:</strong>
                        support@hatimgroup.com
                    </p>
                    <p>
                        <i class="bx bx-building"></i>
                        <strong>Office:</strong>
                        IT Department, 3rd Floor
                    </p>
                    <p>
                        <i class="bx bx-time-five"></i>
                        <strong>Hours:</strong>
                        Sat–Thu, 9:30 AM – 6:30 PM
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(function() {
            function togglePassword() {
                const input = $('#password');
                const toggle = $('.password-toggle');
                const isPassword = input.attr('type') === 'password';

                input.attr('type', isPassword ? 'text' : 'password');

                toggle
                    .toggleClass('bx-hide', !isPassword)
                    .toggleClass('bx-show', isPassword)
                    .attr('aria-label', isPassword ? 'Hide password' : 'Show password')
                    .attr('aria-pressed', isPassword ? 'true' : 'false');
            }

            $('.password-toggle').on('click', togglePassword);

            $('.password-toggle').on('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    togglePassword();
                }
            });
        });
    </script>

</body>

</html>
