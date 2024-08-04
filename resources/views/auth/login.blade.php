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
