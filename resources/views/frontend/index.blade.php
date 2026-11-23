@php $settings = setting(); @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('images/icon/' . ($settings?->favicon ?? 'default.png')) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#082f75">
    <meta name="description"
        content="TechMentor connects expertise with ambition through trusted technology mentorship, advisory and consultancy.">
    <title>TechMentor | Connecting Expertise. Empowering Growth.</title>
    @include('frontend.partial.custom_css')
</head>

<body>
    @include('frontend.partial.header')
    <main>
        @include('frontend.partial.home')
        @include('frontend.partial.about')
        @include('frontend.partial.contact')
    </main>
    @include('frontend.partial.mentor_registration_modal')
    @include('frontend.partial.mentee_registration_modal')
    @include('frontend.partial.organization_registration_modal')
    @include('frontend.partial.footer')
    <script>
        function toggleRegisterMenu(event) {
            event.stopPropagation();
            const m = document.getElementById('registerMenu');
            const b = document.getElementById('registerButton');
            m.classList.toggle('open');
            b.setAttribute('aria-expanded', m.classList.contains('open') ? 'true' : 'false')
        }

        function toggleServiceGroup(button) {
            const group = button.closest('.service-menu-group');
            const willOpen = !group.classList.contains('expanded');
            group.parentElement.querySelectorAll('.service-menu-group').forEach(g => {
                g.classList.remove('expanded');
                const b = g.querySelector('.service-menu-trigger');
                if (b) b.setAttribute('aria-expanded', 'false')
            });
            if (willOpen) {
                group.classList.add('expanded');
                button.setAttribute('aria-expanded', 'true')
            }
        }

        function toggleNavGroup(button) {
            const group = button.closest('.nav-group');
            if (window.matchMedia('(min-width: 761px)').matches) {
                button.blur();
                return
            }
            const willOpen = !group.classList.contains('expanded');
            document.querySelectorAll('.nav-group').forEach(g => {
                g.classList.remove('expanded');
                const b = g.querySelector('.nav-group-button');
                if (b) b.setAttribute('aria-expanded', 'false')
            });
            if (willOpen) {
                group.classList.add('expanded');
                button.setAttribute('aria-expanded', 'true')
            }
        }

        function toggleMenu() {
            const n = document.getElementById('navlinks');
            const b = document.querySelector('.menu-toggle');
            n.classList.toggle('open');
            b.setAttribute('aria-expanded', n.classList.contains('open') ? 'true' : 'false')
        }
        document.querySelectorAll('.navlinks a').forEach(a => a.addEventListener('click', () => {
            document.getElementById('navlinks').classList.remove('open');
            document.querySelector('.menu-toggle').setAttribute('aria-expanded', 'false');
            document.querySelectorAll('.nav-group').forEach(g => g.classList.remove('expanded'))
        }));
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
    <script>
        function openRegistration(type) {

            closeAllRegistrationModals();

            const modalIds = {
                Mentor: 'registrationModal',
                Mentee: 'menteeRegistrationModal',
                Organization: 'organizationRegistrationModal'
            };

            const modal = document.getElementById(modalIds[type]);

            if (modal) {
                modal.classList.add('open');
                document.body.style.overflow = 'hidden';
                document.getElementById('registerMenu').classList.remove('open');
            }
        }

        function closeAllRegistrationModals() {

            document.querySelectorAll('.modal-backdrop').forEach(modal => {
                modal.classList.remove('open');
            });

            document.body.style.overflow = '';
        }

        function closeRegistration() {
            closeAllRegistrationModals();
        }

        function closeMenteeRegistration() {
            closeAllRegistrationModals();
        }

        function closeOrganizationRegistration() {
            closeAllRegistrationModals();
        }

        function backdropClose(e) {
            if (e.target.classList.contains('modal-backdrop')) {
                closeAllRegistrationModals();
            }
        }

        function submitMentor(e) {
            e.preventDefault();
            alert('Thank you for your interest in registering as a Mentor!');
            closeAllRegistrationModals();
        }

        function submitMentee(e) {
            e.preventDefault();
            alert('Thank you for registering as a Mentee!');
            closeAllRegistrationModals();
        }

        function submitOrganization(e) {
            e.preventDefault();
            alert('Thank you for registering your Organization!');
            closeAllRegistrationModals();
        }
    </script>
</body>

</html>
