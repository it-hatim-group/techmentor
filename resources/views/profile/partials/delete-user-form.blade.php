<section class="mb-3">
    <style>
        .modal-body {
            padding: 10px 12px;
        }

        .modal-footer {
            padding: 8px 12px;
        }
    </style>
    
    <header class="mb-2">
        <h2 class="h6 fw-bold text-danger mb-1">
            <i class="bi bi-exclamation-triangle"></i>
            {{ __('Delete Account') }}
        </h2>
        <p class="text-muted small mb-0">
            {{ __('Once deleted, all data will be permanently removed. Download anything you need first.') }}
        </p>
    </header>

    <!-- Delete Button -->
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header py-2">
                        <h6 class="modal-title text-danger">
                            {{ __('Confirm Delete') }}
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body py-2">
                        <p class="text-muted small mb-2">
                            {{ __('Enter password to confirm deletion.') }}
                        </p>

                        <label for="password" class="form-label small mb-1">
                            {{ __('Password') }}
                        </label>

                        <input type="password" name="password" id="password"
                            class="form-control form-control-sm @if ($errors->userDeletion->get('password')) is-invalid @endif">
                    </div>

                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>

                        <button type="submit" class="btn btn-danger btn-sm">
                            {{ __('Delete') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
