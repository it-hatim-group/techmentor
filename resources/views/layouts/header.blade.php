<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">

            <div class="mobile-toggle-menu">
                <i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none">
                <span
                    style="font-size:20px; font-weight:bold; color: white;">{{ $settings->software_title ?? '' }}</span>
            </div>

            <div class="position-relative search-bar d-lg-block d-none text-end" data-bs-toggle="modal"
                data-bs-target="#SearchModal">

                <div id="current-time" style="color:#fff; font-weight:400; font-size:14px; line-height:1.4;">
                </div>

                <script>
                    function updateTime() {
                        const now = new Date();

                        const dateOptions = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };

                        const timeOptions = {
                            hour: 'numeric',
                            minute: 'numeric',
                            second: 'numeric',
                            hour12: true
                        };

                        const date = now.toLocaleDateString('en-US', dateOptions);
                        const time = now.toLocaleTimeString('en-US', timeOptions);

                        document.getElementById('current-time').innerHTML =
                            `${date}<br>${time}`;
                    }

                    setInterval(updateTime, 1000);
                    updateTime();
                </script>
            </div>

            <!-- User Box -->
            <div class="user-box dropdown px-3">
                
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="padding:5px 10px; border-radius:8px; transition: all 0.3s ease;">

                    <!-- Avatar -->
                    <img src="{{ auth()->user()->profile_picture ? asset(auth()->user()->profile_picture) : asset('images/user.png') }}"
                        class="user-img" alt="User avatar"
                        style="width:50px; height:50px; border-radius:50%; border:2px solid #ccc; box-shadow:0 4px 12px rgba(0,0,0,0.2); object-fit:cover;">

                    <!-- User Info -->
                    <div class="user-info" style="line-height:1.2;">
                        <p class="user-name mb-0"
                            style="font-weight:700; font-size:16px; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
                            {{ Auth::user()->name }}</p>
                        <p class="designattion mb-0" style="font-size:14px; font-style:italic; opacity:0.9;">
                            {{ Auth::user()->email }}</p>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    @can('Profile View')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                <i class="bx bx-user fs-5"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                    @endcan
                    @can('Settings View')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('settings.edit') }}">
                                <i class="bx bx-cog fs-5"></i>
                                <span>Setting</span>
                            </a>
                        </li>
                    @endcan
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center"
                                onclick="
                                        event.preventDefault();
                                        localStorage.setItem('logout', Date.now().toString());
                                        this.closest('form').submit();
                                ">
                                <i class="bx bx-log-out-circle"></i>
                                <span>Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="top-menu ms-auto">
        <ul class="navbar-nav align-items-center gap-1">
            <li class="nav-item dropdown dropdown-app">
                <div class="dropdown-menu dropdown-menu-end p-0">
                    <div class="app-container p-2 my-2">
                        <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2"></div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="header-notifications-list"></div>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="header-message-list"></div>
            </li>
        </ul>
    </div>
</header>
