@php $settings = setting(); @endphp
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('images/icon/' . $settings->favicon) }}">
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<title>{{ $settings->favicon_title ?? '' }}</title>
</head>
<body class="">
	<style>
		body {
			background: linear-gradient(135deg, #1E2D6E, #16235a);
			font-family: 'Segoe UI', sans-serif;
			color: #fff;
		}

		.login-card {
			border: none;
			border-radius: 20px;
			box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
			background: linear-gradient(135deg, #fff, #f9f9f9);
			color: #000;
		}

		.brand-text {
			background: linear-gradient(45deg, #1E2D6E, #ED1C24);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			font-weight: 800;
			font-size: 1.8rem;
		}

		.form-label {
			font-weight: 700;
			color: #1E2D6E;
			text-align: left;
			display: block;
		}

		.form-control {
			border-radius: 12px;
			border: 2px solid #1E2D6E;
			padding: 10px;
			font-weight: 600;
		}

		.form-control:focus {
			border-color: #ED1C24;
			box-shadow: 0 0 0 0.2rem rgba(237,28,36,0.25);
		}

		.form-check-input {
			margin-right: 0.25rem; 
			width: 1.2em;          
			height: 1.2em;       
		}

		.form-check-label {
			font-weight: 600;
			color: #1E2D6E;
			margin-left: 0; 
		}

		.form-check-input:checked {
			background-color: #ED1C24;
			border-color: #ED1C24;
		}

		.btn-primary {
			background: linear-gradient(45deg, #ED1C24, #1E2D6E);
			border: none;
			border-radius: 12px;
			padding: 12px;
			font-weight: 700;
			font-size: 1.1rem;
			transition: 0.3s;
		}

		.btn-primary:hover {
			background: linear-gradient(45deg, #1E2D6E, #ED1C24);
			transform: scale(1.05);
		}

		.forgot-link {
			font-weight: 700;
			color: #ED1C24;
			text-decoration: none;
		}

		.forgot-link:hover {
			color: #1E2D6E;
		}

		.text-center a {
			font-weight: 700;
			background: linear-gradient(45deg, #1E2D6E, #ED1C24);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			text-decoration: none;
		}

		.text-center a:hover {
			color: #ED1C24;
		}

		.card-footer {
			background: #1E2D6E;
			color: #fff;
			font-weight: 700;
			font-size: 0.9rem;
			padding: 12px;
			border-radius: 0 0 20px 20px;
		}

		p {
			font-weight: 600;
		}

		.vh-100 {
			min-height: 100vh;
		}

		.form-label i {
			font-size: 1.2rem;
			vertical-align: middle;
			margin-right: 6px;
		}

		.input-group-text a i {
			font-size: 1.2rem;
			cursor: pointer;
			color: #1E2D6E;
		}

		.input-group .form-control {
			border-top-right-radius: 0;
			border-bottom-right-radius: 0;
		}

		.input-group .input-group-text {
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
			background: #fff;
			border-left: none;
		}

		.password-field {
			padding-right: 40px;
			border-radius: 12px;
			width: 100%;
			box-sizing: border-box;
		}

		.password-toggle {
			position: absolute;
			top: 72%;
			right: 15px;
			transform: translateY(-50%);
			cursor: pointer;
			font-size: 1.2rem;
			color: #1E2D6E;
			z-index: 2;
		}

		.password-toggle:hover {
			color: #ED1C24;
		}

		@media (min-width: 992px) {
			.card-body-inner-div {
				padding: 1.2rem;
			}
		}
	</style>

	<!-- Modal -->
	<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content" style="border-radius: 12px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.3);">
			
			<!-- Modal Header -->
			<div class="modal-header" style="background-color: #1E2D6E; color: #fff; border-bottom: none; padding: 16px 24px;">
				<h3 style="margin: 0; font-size: 20px; display: flex; align-items: center; gap: 10px;">
				<i class="lni lni-headphone-alt" style="color: white;"></i>
				<span style="color: white">Contact Support</span>
				</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
			</div>

			<!-- Modal Body -->
			<div class="modal-body" style="padding: 24px; font-size: 14px; color: #333;">
				<p style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
				<i class="fas fa-envelope" style="color: #ED1C24;"></i>
				<strong>Email:</strong> support@hatimgroup.com
				</p>
				<p style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
				<i class="fas fa-building" style="color: #ED1C24;"></i>
				<strong>Office:</strong> IT Department, 3rd Floor
				</p>
				<p style="margin-bottom: 0; display: flex; align-items: center; gap: 10px;">
				<i class="fas fa-clock" style="color: #ED1C24;"></i>
				<strong>Hours:</strong> Sat-Thu 9:30 AM - 6:30 PM
				</p>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer" style="border-top: none; padding: 16px 24px;">
				<button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #ED1C24; color: #fff; border-radius: 6px; padding: 8px 20px; transition: 0.3s;">
				Close
				</button>
			</div>

			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center vh-100">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-6">
						<div class="card login-card">
                            <div class="card-body">
                                <div class="card-body-inner-div text-center">

                                    <div class="text-center mb-4">
                                        <h4 class="brand-text">{{ $settings->favicon_title ?? '' }}</h4>
                                        <p class="text-muted">Forgot your password? Enter your email and we will send you a reset link.</p>
                                    </div>

                                    <div class="mb-4">
                                        <img src="{{ asset('images/logo/' . $settings->logo) }}" 
                                        width="200" 
                                        alt="Logo" 
                                        style="border: 2px solid #000; box-shadow: 5px 5px 15px rgba(0,0,0,0.3); border-radius: 5px;" />
                                    </div>

                                    <!-- Session Status -->
                                    @if (session('status'))
                                        <div class="alert alert-success mb-4">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="row g-3" method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="col-12">
                                            <label class="form-label"><i class="bx bx-envelope"></i> Email</label>
                                            <input 
                                                type="email" 
                                                name="email"
                                                value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" 
                                                placeholder="hatim@gmail.com"
                                                required 
                                                autofocus
                                            >
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    Email Password Reset Link
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Back to Login -->
                                    <div class="text-center mt-3">
                                        <p class="mb-0">
                                            Remembered your password? 
                                            <a href="{{ route('login') }}">Sign in here</a>
                                        </p>
                                        <p><i class="lni lni-question-circle text-danger"></i> 
                                            Need help? <a type="button" 
                                            style="color: #ff0000 !important; text-decoration: none;" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#exampleVerticallycenteredModal">
                                            <i class="fadeIn animated bx bx-phone-call"></i> Contact Support
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
							<div class="card-footer text-center">
								{{ $settings->copyright_text ?? '' }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- plugins -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$(".password-toggle").on('click', function () {
				let input = $(this).siblings('.password-field');
				if (input.attr("type") === "password") {
					input.attr('type', 'text');
					$(this).removeClass("bx-show").addClass("bx-hide");
				} else {
					input.attr('type', 'password');
					$(this).removeClass("bx-hide").addClass("bx-show");
				}
			});
		});
	</script>
    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>