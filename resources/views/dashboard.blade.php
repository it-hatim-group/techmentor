@extends('layouts.app')
@section('content')
    <style>
        .dashboard-header {
            margin-top: -15px;
            margin-bottom: 22px;
        }

        .dashboard-header h4 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #30343b;
        }

        .dashboard-header p {
            color: #7a828e !important;
            font-size: 13px;
        }

        .dashboard-card {
            position: relative;
            height: 100%;
            border: 1px solid #eef0f4 !important;
            border-radius: 12px !important;
            background: #fff;
            overflow: hidden;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: block;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.09) !important;
            border-color: #dfe5ee !important;
        }

        .dashboard-card .card-body {
            position: relative;
            min-height: 135px;
            padding: 22px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .dashboard-card .card-label {
            color: #7a828e;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 9px;
        }

        .dashboard-card h2 {
            margin: 0;
            color: #30343b;
            font-size: 27px;
            font-weight: 700;
            line-height: 1.2;
        }

        .dashboard-card .card-link {
            color: #8a929e;
            font-size: 11px;
            margin-top: 10px;
        }

        .dashboard-card .card-icon {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55px;
            height: 55px;
            border-radius: 12px;
            font-size: 27px;
            transition: all 0.3s ease;
        }

        .dashboard-card:hover .card-icon {
            transform: translateY(-50%) scale(1.1);
        }

        /* Individual card colors */
        .users-card {
            border-left: 4px solid #4d8bff !important;
        }

        .users-card .card-icon {
            background: #edf3ff;
            color: #4d8bff;
        }

        .roles-card {
            border-left: 4px solid #8b5cf6 !important;
        }

        .roles-card .card-icon {
            background: #f3edff;
            color: #8b5cf6;
        }

        .permissions-card {
            border-left: 4px solid #f59e0b !important;
        }

        .permissions-card .card-icon {
            background: #fff6e5;
            color: #f59e0b;
        }

        .organizations-card {
            border-left: 4px solid #06b6d4 !important;
        }

        .organizations-card .card-icon {
            background: #e7faff;
            color: #06b6d4;
        }

        .mentors-card {
            border-left: 4px solid #10b981 !important;
        }

        .mentors-card .card-icon {
            background: #e8fff5;
            color: #10b981;
        }

        .mentees-card {
            border-left: 4px solid #ec4899 !important;
        }

        .mentees-card .card-icon {
            background: #fff0f7;
            color: #ec4899;
        }

        .dashboard-section-title {
            font-size: 15px;
            font-weight: 600;
            color: #444b55;
            margin-bottom: 15px;
        }

        @media (max-width: 767px) {
            .dashboard-header {
                margin-top: 0;
            }

            .dashboard-card .card-body {
                min-height: 120px;
                padding: 18px;
            }

            .dashboard-card h2 {
                font-size: 24px;
            }

            .dashboard-card .card-icon {
                right: 15px;
                width: 45px;
                height: 45px;
                font-size: 23px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .dashboard-card,
            .dashboard-card .card-icon {
                transition: none;
            }

            .dashboard-card:hover {
                transform: none;
            }
        }
    </style>
    {{-- Dashboard Header --}}
    <div class="dashboard-header">
        <h4>Welcome to Your Dashboard</h4>
        <p class="mb-0">
            Manage your users, organizations, mentors and mentees from one place.
        </p>
    </div>
    <hr>
    {{-- Dashboard Statistics --}}
    <div class="dashboard-section-title">
        <i class="bx bx-bar-chart-alt-2 me-1"></i>
        System Overview
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3">
        {{-- Total Mentors --}}
        <div class="col">
            <a href="{{ route('mentor.index') }}" class="card dashboard-card mentors-card">
                <div class="card-body">
                    <p class="card-label">Total Mentors</p>
                    <h2>{{ number_format($numberOfMentors) }}</h2>
                    <span class="card-link">View Mentors <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-user-voice card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Mentees --}}
        <div class="col">
            <a href="{{ route('mentee.index') }}" class="card dashboard-card mentees-card">
                <div class="card-body">
                    <p class="card-label">Total Mentees</p>
                    <h2>{{ number_format($numberOfMentees) }}</h2>
                    <span class="card-link">View Mentees <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-group card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Organizations --}}
        <div class="col">
            <a href="{{ route('organization.index') }}" class="card dashboard-card organizations-card">
                <div class="card-body">
                    <p class="card-label">Total Organizations</p>
                    <h2>{{ number_format($numberOfOrganizations) }}</h2>
                    <span class="card-link">View Organizations <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-buildings card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Contacts --}}
        <div class="col">
            <a href="{{ route('contact.index') }}" class="card dashboard-card contacts-card">
                <div class="card-body">
                    <p class="card-label">Total Contacts</p>
                    <h2>{{ number_format($numberOfContacts) }}</h2>
                    <span class="card-link">View Contacts <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-user card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Users --}}
        <div class="col">
            <a href="{{ route('users.index') }}" class="card dashboard-card users-card">
                <div class="card-body">
                    <p class="card-label">Total Users</p>
                    <h2>{{ number_format($numberOfUsers) }}</h2>
                    <span class="card-link">View Users <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-user card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Roles --}}
        <div class="col">
            <a href="{{ route('roles.index') }}" class="card dashboard-card roles-card">
                <div class="card-body">
                    <p class="card-label">Total Roles</p>
                    <h2>{{ number_format($numberOfRoles) }}</h2>
                    <span class="card-link">View Roles <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-shield card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        {{-- Total Permissions --}}
        <div class="col">
            <a href="{{ route('permissions.index') }}" class="card dashboard-card permissions-card">
                <div class="card-body">
                    <p class="card-label">Total Permissions</p>
                    <h2>{{ number_format($numberOfPermissions) }}</h2>
                    <span class="card-link">View Permissions <i class="bx bx-right-arrow-alt"></i></span>
                    <i class="bx bx-lock card-icon" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
@endsection
