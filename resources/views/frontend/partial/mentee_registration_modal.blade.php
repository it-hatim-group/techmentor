@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal-backdrop" id="menteeRegistrationModal" role="dialog" aria-modal="true" aria-labelledby="menteeTitle"
    onclick="backdropClose(event)">
    <div class="reg-modal">
        <div class="modal-head">
            <div>
                <h2 id="menteeTitle">Register as Mentee</h2>
                <p>Tell us what you want to learn and where you want to grow.</p>
            </div>
            <button class="modal-close" type="button" onclick="closeMenteeRegistration()">×</button>
        </div>
        <form class="reg-form" action="{{ route('register.mentee') }}" method="POST">
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
                Your career or learning goals
                <textarea name="goals" rows="3" required placeholder="What would you like guidance with?">{{ old('goals') }}</textarea>
            </label>
            <label class="full">
                Current profession or interest
                <input type="text" name="profession" value="{{ old('profession') }}"
                    placeholder="e.g. Software Developer">
            </label>
            <label class="full">
                <input type="checkbox" name="terms_accepted" value="1" required
                    {{ old('terms_accepted') ? 'checked' : '' }}>
                I agree to the Terms of Service and Privacy Policy.
            </label>
            <button class="btn btn-primary" type="submit">
                Submit Mentee Registration →
            </button>
        </form>
    </div>
</div>
