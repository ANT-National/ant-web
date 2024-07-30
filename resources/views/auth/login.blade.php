<x-auth-layout>
<div class="mb-10">
    <h1 class="text-4xl font-bold">Sign in to your account</h1>
</div>
{{-- Form --}}
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="space-y-4">
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700" for="email">
                Email
            </label>
            <input
                id="email"
                name="email"
                class="form-input w-full py-2"
                type="email"
                placeholder="corybarker@email.com"
                required
            />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700" for="password">
                Password
            </label>
            <input
                id="password"
                name="password"
                class="form-input w-full py-2"
                type="password"
                autocomplete="on"
                placeholder="••••••••"
                required
            />
        </div>
    </div>
    <div class="mt-6">
        <button class="btn w-full bg-gradient-to-t from-primary to-cyan-400 bg-[length:100%_100%] bg-[bottom] text-white shadow hover:bg-[length:100%_150%]">
            Sign In
        </button>
    </div>
</form>
{{-- Bottom link --}}
{{--<div class="mt-6 text-center">
    <a
        class="text-sm text-gray-700 underline hover:no-underline"
        href="{{ route('password.request') }}"
    >
        Forgot password
    </a>
</div>--}}
</x-auth-layout>

{{--<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}
