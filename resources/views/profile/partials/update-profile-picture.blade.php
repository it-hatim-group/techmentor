<style>
    .profile-img-container {
        position: relative;
        width: 90px;
        height: 90px;
        margin: auto;
    }

    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #dee2e6;
    }

    .profile-upload-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        transform: translate(-30%, -30%);
        border-radius: 50%;
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .btn i {
        vertical-align: middle;
        font-size: 1.1rem;
        margin: 0;
    }

    #profile_picture {
        display: none;
    }
</style>

<section class="text-center">
    <form method="POST" action="{{ route('profile.updateProfileImage') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="profile-img-container mb-2">
            <img id="previewImage"
                src="{{ $user->profile_picture
                    ? asset(str_replace('public/', '', $user->profile_picture))
                    : asset('images/user.png') }}"
                class="shadow-sm" alt="Profile Image">
            <label for="profile_picture" class="btn btn-primary shadow profile-upload-btn">
                <i class="fadeIn animated bx bx-camera"></i>
            </label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
        </div>

        @error('profile_picture')
            <div class="text-danger small mb-1">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="btn btn-sm btn-primary px-3 py-1">
            {{ __('Save Changes') }}
        </button>

        @if (session('status') === 'profile-updated')
            <div id="savedMessage" class="text-success small mt-1">
                ✔ Saved successfully
            </div>
        @endif

    </form>
</section>

<script>
    document.getElementById('profile_picture').addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            document.getElementById('previewImage').src = URL.createObjectURL(file);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const msg = document.getElementById('savedMessage');
        if (msg) {
            setTimeout(() => msg.style.display = 'none', 1500);
        }
    });
</script>
