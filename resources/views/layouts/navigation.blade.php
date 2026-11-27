<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Logo / Nama Sistem --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}"
                   class="text-xl font-bold text-gray-800">
                    Sistem Penggajian
                </a>
            </div>

            {{-- Menu Desktop --}}
            <div class="hidden sm:flex sm:items-center sm:space-x-8">

                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}"
                   class="text-gray-700 hover:text-blue-600">
                    Dashboard
                </a>

                {{-- Jabatan --}}
                <a href="{{ route('jabatans.index') }}"
                   class="text-gray-700 hover:text-blue-600">
                    Jabatan
                </a>

                {{-- Pegawai --}}
                <span class="text-gray-400 cursor-not-allowed">
                    Pegawai
                </span>

                {{-- Penggajian --}}
                <span class="text-gray-400 cursor-not-allowed">
                    Penggajian
                </span>

                {{-- Laporan --}}
                <span class="text-gray-400 cursor-not-allowed">
                    Laporan
                </span>

                {{-- Dropdown User --}}
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
                            {{ Auth::user()->name }}

                            <svg class="ms-2 h-4 w-4"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        {{-- Profile --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil
                        </x-dropdown-link>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                href="#"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>
    </div>
</nav>