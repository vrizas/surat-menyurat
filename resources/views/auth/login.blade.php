<title>Butuh Surat</title>
<link rel="icon" href="{{ asset('favicon.ico') }}">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Perangkat Ini') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3" style="background-color: #1976d2;">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
