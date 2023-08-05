{{-- <x-guest-layout>
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
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ config('app.default_avatar') }}"
                        height="100" /></a>
            </div>
            <form class="card card-md" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">
                        {{ __('Login to your account') }}
                    </h2>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label><input id="email"
                            value="{{ old('email') }}" name="email" type="email" class="form-control"
                            placeholder="Enter email" autocomplete="off" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div class="mb-2">
                        <label class="form-label">{{ __('Password') }}<span class="form-label-description"><a
                                    href="{{ route('password.request') }}">{{ __('I forgot password') }}</a></span></label>
                        <div class="input-group input-group-flat">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Password" autocomplete="off" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <span class="input-group-text"><a href="#" class="link-secondary"
                                    title="Show password" data-bs-toggle="tooltip"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                        </path>
                                    </svg></a></span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check"><input type="checkbox" class="form-check-input"
                                name="remember" /><span class="form-check-label">{{ __('Remember me') }}</span></label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Sign in') }}
                        </button>
                    </div>
                </div>
                <div class="hr-text">{{ __('Or') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="/auth/google" class="btn btn-google w-100"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                                </svg>{{ __('Login with Google') }}</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                {{ __("Don't have account yet?") }}
                <a tabindex="-1" href="http://localhost:8000/register">{{ __('Sign up') }}</a>
            </div>
        </div>
    </div>
</x-guest-layout>
