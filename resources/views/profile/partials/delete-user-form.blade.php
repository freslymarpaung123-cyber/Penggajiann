```blade
<section>

    <div class="alert alert-danger">
        <h5>
            <i class="fas fa-exclamation-triangle mr-2"></i>
            Hapus Akun
        </h5>

        <p class="mb-0">
            Setelah akun dihapus, seluruh data yang berkaitan dengan akun ini akan dihapus secara permanen.
            Pastikan Anda sudah mencadangkan data yang diperlukan sebelum melanjutkan.
        </p>
    </div>

    <button
        type="button"
        class="btn btn-danger"
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">

        <i class="fas fa-trash mr-1"></i>
        Hapus Akun

    </button>


    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable>

        <form method="POST"
              action="{{ route('profile.destroy') }}"
              class="p-4">

            @csrf
            @method('DELETE')

            <h4 class="mb-3 text-danger">
                Konfirmasi Hapus Akun
            </h4>

            <p class="text-muted">
                Tindakan ini tidak dapat dibatalkan.
                Masukkan kata sandi Anda untuk mengonfirmasi penghapusan akun.
            </p>

            <div class="form-group">

                <label for="password">
                    Kata Sandi
                </label>

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Masukkan kata sandi" />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="text-danger mt-2" />

            </div>

            <div class="text-right mt-4">

                <button
                    type="button"
                    class="btn btn-secondary"
                    x-on:click="$dispatch('close')">

                    Batal

                </button>

                <button
                    type="submit"
                    class="btn btn-danger ml-2">

                    <i class="fas fa-trash mr-1"></i>
                    Ya, Hapus Akun

                </button>

            </div>

        </form>

    </x-modal>

</section>