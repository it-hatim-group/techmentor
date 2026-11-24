<div class="modal-backdrop" id="organizationRegistrationModal" role="dialog" aria-modal="true"
    aria-labelledby="organizationTitle" onclick="backdropClose(event)">
    <div class="reg-modal">
        <div class="modal-head">
            <div>
                <h2 id="organizationTitle">Register as Organization</h2>
                <p>Introduce your organization and its technology needs.</p>
            </div>
            <button class="modal-close" type="button" onclick="closeOrganizationRegistration()">×</button>
        </div>
        <form class="reg-form" action="{{ route('register.organization') }}" method="POST">
            @csrf
            <label>
                Contact person's name
                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                    placeholder="Your full name">
            </label>
            <label>
                Business email
                <input type="email" name="email" value="{{ old('email') }}" required
                    placeholder="name@company.com">
            </label>
            <label>
                Mobile number
                <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+8801XXXXXXXXX">
            </label>
            <label>
                Organization name
                <input type="text" name="organization_name" value="{{ old('organization_name') }}" required
                    placeholder="Company or institution">
            </label>
            <label class="full">
                Technology / consultancy requirements
                <textarea name="requirements" rows="4" required placeholder="Briefly describe your organization's needs">{{ old('requirements') }}</textarea>
            </label>
            <label class="full">
                <input type="checkbox" name="terms_accepted" value="1" required
                    {{ old('terms_accepted') ? 'checked' : '' }}>
                I agree to the Terms of Service and Privacy Policy.
            </label>
            <button class="btn btn-primary" type="submit">
                Submit Organization Registration →
            </button>
        </form>
    </div>
</div>
