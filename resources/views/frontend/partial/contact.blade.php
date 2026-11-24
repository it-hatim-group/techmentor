<section class="cta" id="contact">
    <div class="container cta-box">
        <div>
            <div class="kicker">Your next step starts here</div>
            <h2>Connect with the Right Expertise.</h2>
            <p>
                Tell us whether you are seeking mentorship or technology consultancy.
                We’ll help you identify the right next step.
            </p>
        </div>
        <a class="btn btn-primary" href="#contact-form">Start an Enquiry →</a>
    </div>

    <div class="container" style="margin-top:34px">
        <form id="contact-form" class="service" action="{{ route('contact.store') }}" method="POST"
            style="max-width:760px;margin:auto;display:grid;grid-template-columns:1fr 1fr;gap:14px">
            @csrf
            {{-- Success Message --}}
            @if (session('success'))
                <div style="grid-column:1/-1;padding:14px;background:#e8f8ee;color:#18753a;border-radius:10px">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div style="grid-column:1/-1;padding:14px;background:#fff0f0;color:#c62828;border-radius:10px">
                    <ul style="margin:0;padding-left:20px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label style="font-size:13px;font-weight:750">
                Your name
                <input required type="text" name="name" value="{{ old('name') }}" placeholder="Full name"
                    style="display:block;width:100%;margin-top:7px;padding:13px;border:1px solid #cbd9e9;border-radius:10px;font:inherit">
            </label>
            <label style="font-size:13px;font-weight:750">
                Email address
                <input required type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                    style="display:block;width:100%;margin-top:7px;padding:13px;border:1px solid #cbd9e9;border-radius:10px;font:inherit">
            </label>
            <label style="font-size:13px;font-weight:750;grid-column:1/-1">
                I am interested in
                <select name="interest" required
                    style="display:block;width:100%;margin-top:7px;padding:13px;border:1px solid #cbd9e9;border-radius:10px;font:inherit">
                    <option value="Individual mentorship"
                        {{ old('interest') == 'Individual mentorship' ? 'selected' : '' }}>
                        Individual mentorship
                    </option>
                    <option value="Corporate technology consultancy"
                        {{ old('interest') == 'Corporate technology consultancy' ? 'selected' : '' }}>
                        Corporate technology consultancy
                    </option>
                    <option value="Learning and professional development"
                        {{ old('interest') == 'Learning and professional development' ? 'selected' : '' }}>
                        Learning and professional development
                    </option>
                    <option value="Becoming a mentor" {{ old('interest') == 'Becoming a mentor' ? 'selected' : '' }}>
                        Becoming a mentor
                    </option>
                </select>
            </label>
            <label style="font-size:13px;font-weight:750;grid-column:1/-1">
                How can we help?
                <textarea name="message" rows="3" placeholder="Briefly describe your goals or requirements"
                    style="display:block;width:100%;margin-top:7px;padding:13px;border:1px solid #cbd9e9;border-radius:10px;font:inherit;resize:vertical">{{ old('message') }}</textarea>
            </label>
            <button class="btn btn-primary" type="submit" style="grid-column:1/-1;justify-self:start">
                Submit Enquiry →
            </button>
            <small style="grid-column:1/-1;color:#6a7890">
                Your enquiry will be securely submitted and stored.
            </small>
        </form>
    </div>
</section>
