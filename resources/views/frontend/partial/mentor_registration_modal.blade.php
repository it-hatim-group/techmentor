@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal-backdrop" id="registrationModal" role="dialog" aria-modal="true" aria-labelledby="mentorTitle"
    onclick="backdropClose(event)">

    <div class="reg-modal">

        <div class="modal-head">
            <div>
                <h2 id="mentorTitle">Register as Mentor</h2>
                <p>Share your expertise and guide the next generation.</p>
            </div>

            <button class="modal-close" type="button" onclick="closeRegistration()">×</button>
        </div>

        <form class="reg-form" action="{{ route('register.mentor') }}" method="POST">

            @csrf

            <label>
                Full name
                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                    placeholder="Your full name">
            </label>

            <label>
                Email address
                <input type="email" name="email" value="{{ old('email') }}" required
                    placeholder="name@example.com">
            </label>

            <label>
                Mobile number
                <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+8801XXXXXXXXX">
            </label>

            <label class="full">
                Area of expertise
                <input type="text" name="expertise" value="{{ old('expertise') }}" required
                    placeholder="e.g. ERP, Cybersecurity, IT Leadership">
            </label>

            <label class="full">
                Professional experience
                <select name="experience" required>
                    <option value="">Select experience level</option>

                    @foreach (['5–10 years', '10–15 years', '15–20 years', '20+ years'] as $level)
                        <option value="{{ $level }}" {{ old('experience') == $level ? 'selected' : '' }}>
                            {{ $level }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label class="full">
                <input type="checkbox" name="terms_accepted" value="1" required
                    {{ old('terms_accepted') ? 'checked' : '' }}>

                I agree to the Terms of Service and Privacy Policy.
            </label>

            <button class="btn btn-primary" type="submit">
                Submit Mentor Registration →
            </button>

        </form>
    </div>
</div>
