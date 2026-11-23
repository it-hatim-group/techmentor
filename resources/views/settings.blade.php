@extends('layouts.app')

@section('content')
    <style>
        table tbody tr td {
            padding: 4px 6px !important;
        }

        .ck-editor {
            width: 100%;
        }

        .ck-editor__editable_inline {
            min-height: 120px !important;
            max-height: 300px;
            overflow-y: auto;
            white-space: pre-wrap;
        }

        .btn-save {
            background: #1E2D6E;
            color: #fff;
            border: none;
            transition: 0.2s;
        }

        .btn-save:hover {
            background: #001F4D;
            color: #fff;
        }

        .btn-reset {
            background: #ED1C24;
            color: #fff;
            border: none;
            transition: 0.2s;
        }

        .btn-reset:hover {
            background: #B2001B;
            color: #fff;
        }

        .form-control:focus {
            border-color: #1E2D6E;
            box-shadow: 0 0 5px rgba(30, 45, 110, 0.3);
        }

        .img-thumbnail {
            border-radius: 8px;
            object-fit: cover;
        }
    </style>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">

                <div class="card-header px-4 py-3">
                    <h5 class="mb-0">Software Settings</h5>
                </div>

                <div class="card-body p-4">

                    <form class="row g-3 needs-validation" novalidate action="{{ route('settings.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Company Name --}}
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">
                                Company Name
                            </label>

                            <input type="text" id="company_name" class="form-control" name="company_name"
                                value="{{ old('company_name', $settings->company_name ?? '') }}"
                                placeholder="Enter Company Name" required>

                            <div class="invalid-feedback">
                                Please enter the company name.
                            </div>

                            @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Software Title --}}
                        <div class="col-md-6">
                            <label for="software_title" class="form-label">
                                Software Title
                            </label>

                            <input type="text" id="software_title" class="form-control" name="software_title"
                                value="{{ old('software_title', $settings->software_title ?? '') }}"
                                placeholder="Enter Software Title" required>

                            <div class="invalid-feedback">
                                Please enter the software title.
                            </div>

                            @error('software_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- About Us --}}
                        <div class="col-md-12">
                            <label for="aboutUs" class="form-label">
                                About Us
                            </label>

                            <textarea class="form-control shadow-none" id="aboutUs" name="about_us" rows="3"
                                placeholder="Enter About Us content..." required>{{ old('about_us', $settings->about_us ?? '') }}</textarea>

                            <div class="invalid-feedback">
                                Please enter about us information.
                            </div>

                            @error('about_us')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload Logo --}}
                        <div class="col-md-6">
                            <label for="logo" class="form-label">
                                Upload Logo
                            </label>

                            <div class="d-flex align-items-center gap-2">
                                <img id="logoPreview"
                                    src="{{ !empty($settings->logo) ? asset('images/logo/' . $settings->logo) : 'https://placehold.co/120x45?text=Logo' }}"
                                    class="img-thumbnail" style="width:120px; height:45px;" alt="Logo Preview">

                                <input type="file" id="logo" class="form-control" name="logo" accept="image/*"
                                    onchange="previewImage(event, 'logoPreview')">
                            </div>

                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload Favicon --}}
                        <div class="col-md-6">
                            <label for="favicon" class="form-label">
                                Upload Favicon
                            </label>

                            <div class="d-flex align-items-center gap-2">
                                <img id="faviconPreview"
                                    src="{{ !empty($settings->favicon) ? asset('images/icon/' . $settings->favicon) : 'https://placehold.co/40x40?text=Icon' }}"
                                    class="img-thumbnail" style="width:40px; height:40px;" alt="Favicon Preview">

                                <input type="file" id="favicon" class="form-control" name="favicon" accept="image/*"
                                    onchange="previewImage(event, 'faviconPreview')">
                            </div>

                            @error('favicon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Favicon Title --}}
                        <div class="col-md-6">
                            <label for="favicon_title" class="form-label">
                                Favicon Title
                            </label>

                            <input type="text" id="favicon_title" class="form-control" name="favicon_title"
                                value="{{ old('favicon_title', $settings->favicon_title ?? '') }}"
                                placeholder="Enter Favicon Title" required>

                            <div class="invalid-feedback">
                                Please enter the favicon title.
                            </div>

                            @error('favicon_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Copyright Text --}}
                        <div class="col-md-6">
                            <label for="copyright_text" class="form-label">
                                Copyright Text
                            </label>

                            <input type="text" id="copyright_text" class="form-control" name="copyright_text"
                                value="{{ old('copyright_text', $settings->copyright_text ?? '') }}"
                                placeholder="© 2026 Your Company">

                            @error('copyright_text')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid gap-3 mt-3">

                                <button type="submit" class="btn btn-save px-4">
                                    Save Settings
                                </button>

                                <button type="reset" class="btn btn-reset px-4">
                                    Reset
                                </button>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Page Scripts --}}
@push('scripts')
    {{-- CKEditor Script --}}
    <script src="{{ asset('assets/plugins/ck-editor/ckeditor.js') }}"></script>

    <script>
        // Image preview
        function previewImage(event, previewId) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        // Initialize CKEditor
        document.addEventListener('DOMContentLoaded', function() {
            const aboutUsElement = document.getElementById('aboutUs');

            if (!aboutUsElement) {
                console.error('CKEditor: #aboutUs textarea not found.');
                return;
            }

            if (typeof ClassicEditor === 'undefined') {
                console.error(
                    'CKEditor failed to load. Check the ckeditor.js file path and version.'
                );
                return;
            }

            ClassicEditor
                .create(aboutUsElement)
                .then(function(editor) {
                    window.aboutUsEditor = editor;
                    console.log('CKEditor initialized successfully.');
                })
                .catch(function(error) {
                    console.error('CKEditor initialization failed:', error);
                });
        });
    </script>
@endpush
