@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-4">

            <!-- Profile Information Card -->
            <div class="col-12">
                <div class="card modern-card h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <h3 class="mb-0" style="font-size: 1.4rem;">My Profile</h3>
                            <small class="text-muted" style="font-size: 0.9rem;">
                                Manage your account settings securely
                            </small>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-md-2 p-3">
                                @include('profile.partials.update-profile-picture')
                            </div>
                            <div class="col-md-10 d-flex justify-content-center">
                                <div class="text-center w-100">
                                    @include('profile.partials.update-profile-basic-information')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="card modern-card h-100">
                    <div class="card-body p-4">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account Card -->
            @role(['Developer'])
                <div class="col-12">
                    <div class="card delete-card">
                        <div class="card-body p-4">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            @endrole

        </div>
    </div>
@endsection
