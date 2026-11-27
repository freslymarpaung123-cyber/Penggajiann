<div class="user-panel mt-3 pb-3 mb-3 d-flex">

    <div class="image">
    <img src="{{ asset('images/profil.png') }}"
         class="img-circle elevation-2"
         alt="User Image">
</div>

    <div class="info">
        <a href="{{ route('profile.edit') }}" class="d-block">
            {{ Auth::user()->name }}
        </a>

        <span class="text-white">
            Administrator
        </span>
    </div>

</div>