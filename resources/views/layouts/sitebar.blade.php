<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header"
        style="display:flex; align-items:center; justify-content:space-between; padding:15px; border-bottom:2px solid #ccc; border-radius:0 0 10px 10px;">
        <div style="display:flex; align-items:center;">
            <a href="{{ route('dashboard') }}">
                <img id="logoPreview"
                    src="{{ isset($settings->logo) ? asset('images/logo/' . $settings->logo) : 'https://via.placeholder.com/50' }}"
                    class="img-thumbnail" style="width:150px; height:50px;" alt="Logo Preview">
            </a>
        </div>
        <div class="toggle-icon ms-auto" style="cursor:pointer; color:#fff; font-size:24px; transition:all 0.3s ease;">
            <i class="bx bx-menu" style="color:#fff;"></i>
        </div>
    </div>
    <ul class="metismenu" id="menu">
        {{-- Dashboard --}}
        @can('Dashboard View')
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon">
                        <i class="bx bx-home-alt"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endcan

        {{-- Mentor --}}
        @canany(['Mentors'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="menu-title">Mentors</div>
                </a>
                <ul>
                    @can('Mentors')
                        <li>
                            <a href="{{ route('mentor.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Mentor List
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        {{-- Mentee --}}
        @canany(['Mentees'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bx bx-group"></i>
                    </div>
                    <div class="menu-title">Mentees</div>
                </a>
                <ul>
                    @can('Mentees')
                        <li>
                            <a href="{{ route('mentee.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Mentee List
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        {{-- Organization --}}
        @canany(['Organizations'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bx bx-building"></i>
                    </div>
                    <div class="menu-title">Organizations</div>
                </a>
                <ul>
                    @can('Organizations')
                        <li>
                            <a href="{{ route('organization.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Organization List
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        {{-- Contacts --}}
        @canany(['Contacts'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="fadeIn animated bx bx-message-rounded-detail"></i>
                    </div>
                    <div class="menu-title">Contacts</div>
                </a>
                <ul>
                    @can('Contacts')
                        <li>
                            <a href="{{ route('contact.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Contact List
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        {{-- User Management --}}
        @canany(['Permissions View', 'Roles View', 'Users View'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">User Management</div>
                </a>
                <ul>
                    {{-- Manage Permissions --}}
                    @can('Permissions View')
                        <li>
                            <a href="{{ route('permissions.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Manage Permissions
                            </a>
                        </li>
                    @endcan

                    {{-- Manage Roles --}}
                    @can('Roles View')
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Manage Role
                            </a>
                        </li>
                    @endcan

                    {{-- Manage Users --}}
                    @can('Users View')
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="bx bx-radio-circle"></i>
                                Manage User
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        {{-- Profile --}}
        @can('Profile View')
            <li>
                <a href="{{ route('profile.edit') }}">
                    <div class="parent-icon">
                        <i class="lni lni-users"></i>
                    </div>
                    <div class="menu-title">Profile</div>
                </a>
            </li>
        @endcan

        {{-- Settings --}}
        @can('Settings View')
            <li>
                <a href="{{ route('settings.edit') }}">
                    <div class="parent-icon">
                        <i class="lni lni-cog"></i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
            </li>
        @endcan
    </ul>
</div>
