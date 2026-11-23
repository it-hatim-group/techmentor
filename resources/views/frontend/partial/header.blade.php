    <header class="topbar">
        <div class="container nav">
            <a class="brand" href="#home" aria-label="TechMentor home">
                <img src="{{ isset($settings->logo) ? asset('images/logo/' . $settings->logo) : 'https://via.placeholder.com/50' }}"
                    alt="TechMentor — Trust, Technology, Mentorship, Growth"
                    style="border: 1px solid lightgray; border-radius: 5px;">
            </a>
            <button class="menu-toggle" aria-label="Open navigation" aria-expanded="false"
                onclick="toggleMenu()">☰</button>
            <nav class="navlinks" id="navlinks" aria-label="Main navigation">
                <a href="#home">Home</a>
                <div class="nav-group"><button class="nav-group-button" type="button" aria-expanded="false"
                        onclick="toggleNavGroup(this)">Service <span>⌄</span></button>
                    <div class="nav-submenu wide service-menu">
                        <div class="service-menu-group"><button class="service-menu-trigger" type="button"
                                aria-expanded="false" onclick="toggleServiceGroup(this)">For Mentor
                                <span>›</span></button>
                            <div class="service-submenu"><a href="#for-mentor">One-to-One Mentorship</a><a
                                    href="#for-mentor">Leadership & Executive Guidance</a><a
                                    href="#for-mentor">Technical Knowledge Sharing</a><a href="#for-mentor">Group
                                    Mentoring & Workshops</a></div>
                        </div>
                        <div class="service-menu-group"><button class="service-menu-trigger" type="button"
                                aria-expanded="false" onclick="toggleServiceGroup(this)">For Mentee
                                <span>›</span></button>
                            <div class="service-submenu"><a href="#for-mentee">Career Guidance & Planning</a><a
                                    href="#for-mentee">Technical & Leadership Mentoring</a><a href="#for-mentee">Skills
                                    & Certification Support</a><a href="#for-mentee">Career Transition & Growth</a>
                            </div>
                        </div>
                        <div class="service-menu-group"><button class="service-menu-trigger" type="button"
                                aria-expanded="false" onclick="toggleServiceGroup(this)">For Organizations
                                <span>›</span></button>
                            <div class="service-submenu"><a href="#for-organizations">IT Strategy & Digital
                                    Transformation</a><a href="#for-organizations">ERP & Enterprise Systems
                                    Advisory</a><a href="#for-organizations">Cybersecurity & IT Governance</a><a
                                    href="#for-organizations">Technology & Project Assessment</a><a
                                    href="#for-organizations">CIO/CTO-Level Consultation</a>
                                <div class="service-menu-nested"><a class="service-menu-parent" href="#is-audit">IS
                                        Audit Services <span>‹</span></a>
                                    <div class="service-menu-nested-items"><a href="#is-audit">IS Audit &
                                            Assurance</a><a href="#is-audit-itgc">IT General Controls (ITGC)
                                            Review</a><a href="#is-audit-erp">ERP & Application Controls Audit</a><a
                                            href="#is-audit-risk">IT Risk, Compliance & Audit Readiness</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
                <div class="mobile-register-group">
                    <div class="submenu-heading">Choose your account type</div><a href="#registration"
                        onclick="openRegistration('Mentor');return false">Register as Mentor</a><a href="#registration"
                        onclick="openRegistration('Mentee');return false">Register as Mentee</a><a href="#registration"
                        onclick="openRegistration('Organization');return false">Register as Organization</a>
                </div>
            </nav>
            <div class="navactions">
                <div class="register-wrap"><button class="btn btn-primary" type="button"
                        onclick="toggleRegisterMenu(event)" aria-expanded="false" id="registerButton">Register
                        ▾</button>
                    <div class="register-menu" id="registerMenu" role="menu">
                        <div class="register-menu-heading">Choose your account type</div><a class="register-option"
                            href="#registration" onclick="openRegistration('Mentor');return false"><span
                                class="option-icon">♙</span><span><strong>Register as Mentor</strong><small>Share
                                    expertise and guide others</small></span></a><a class="register-option"
                            href="#registration" onclick="openRegistration('Mentee');return false"><span
                                class="option-icon">♧</span><span><strong>Register as Mentee</strong><small>Find
                                    guidance and grow your career</small></span></a><a class="register-option"
                            href="#registration" onclick="openRegistration('Organization');return false"><span
                                class="option-icon">▥</span><span><strong>Register as
                                    Organization</strong><small>Access technology advisory</small></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
