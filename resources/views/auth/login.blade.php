<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="loginRegisterLogo">E SHOPPER</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

       <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto mt-8">
    @csrf

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input id="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
    </div>

    <div class="mb-6">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input id="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="current-password" />
    </div>

    <div class="mb-6">
        <label class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" class="form-checkbox">
            <span class="ml-2 text-sm text-gray-700">Remember me</span>
        </label>
    </div>

    <div class="flex items-center justify-between">
        @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
        @endif

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Log in
        </button>
    </div>
</form>

    </x-authentication-card>
</x-guest-layout>
