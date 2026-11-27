blade
<section>
    <header>
        <h2 class="h5 font-weight-bold">
            Ubah Kata Sandi
        </h2>

        <p class="text-muted mb-4">
            Gunakan kata sandi yang kuat agar akun Anda tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password">
                Kata Sandi Saat Ini
            </label>

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="text-danger mt-2"
            />
        </div>

        <div class="form-group">
            <label for="update_password_password">
                Kata Sandi Baru
            </label>

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="text-danger mt-2"
            />
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">
                Konfirmasi Kata Sandi Baru
            </label>

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="text-danger mt-2"
            />
        </div>

        <div class="mt-4">

            <button type="submit" class="btn btn-warning">
                <i class="fas fa-key mr-1"></i>
                Ubah Kata Sandi
            </button>

            @if (session('status') === 'password-updated')

                <span class="text-success ml-3">
                    <i class="fas fa-check-circle"></i>
                    Kata sandi berhasil diperbarui.
                </span>

            @endif

        </div>

    </form>

</section>