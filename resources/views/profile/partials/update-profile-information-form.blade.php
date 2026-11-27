<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, email address, and profile photo.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post"
          action="{{ route('profile.update') }}"
          enctype="multipart/form-data"
          class="mt-6 space-y-6">

        @csrf
        @method('patch')

        <!-- Foto Profil -->
        <div class="text-center">

            @if($user->foto)
                <img
                    src="{{ asset('storage/' . $user->foto) }}"
                    alt="Foto Profil"
                    style="width:150px;height:150px;object-fit:cover;border-radius:50%;border:3px solid #ddd;">
            @else
                <img
                    src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                    alt="Foto Profil"
                    style="width:150px;height:150px;object-fit:cover;border-radius:50%;border:3px solid #ddd;">
            @endif

        </div>

        <div>
            <x-input-label for="foto" :value="__('Foto Profil')" />

            <input
                id="foto"
                name="foto"
                type="file"
                class="mt-1 block w-full border rounded p-2">

            <x-input-error
                class="mt-2"
                :messages="$errors->get('foto')" />
        </div>

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name" />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username" />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div>

                    <p class="text-sm mt-2 text-gray-800">

                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900">

                            {{ __('Click here to re-send the verification email.') }}

                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2 text-sm text-green-600">

                            {{ __('A new verification link has been sent to your email address.') }}

                        </p>

                    @endif

                </div>

            @endif

        </div>

       <!-- Tombol Simpan -->
<div class="mt-4">

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save mr-1"></i>
        Simpan Perubahan
    </button>

    @if (session('status') === 'profile-updated')

        <span class="text-success ml-2">
            <i class="fas fa-check-circle"></i>
            Profil berhasil diperbarui.
        </span>

    @endif

</div>

    </form>

</section>