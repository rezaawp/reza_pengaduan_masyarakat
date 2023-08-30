<x-guest-layout>
    <div class="page page-center">
        <div class="container-tight">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ config('app.default_avatar') }}"
                        height="100" /></a>
            </div>
            <form class="card card-md" method="POST" action="{{ route('register.admin') }}">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">
                        {{ __('Create new account') }}
                    </h2>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}</label><input id="name" name="name"
                            type="text" class="form-control" placeholder="{{ __('Enter name') }}"
                            value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('No. Telp') }}</label><input id="name" name="no_telp"
                            type="text" class="form-control" placeholder="{{ __('No. Telp') }}"
                            value="{{ old('no_telp') }}" />
                        <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label><input id="email" name="email"
                            type="email" class="form-control" placeholder="{{ __('Enter email') }}"
                            value="{{ old('email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Password" autocomplete="off" value="" />
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password"
                                    data-bs-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                        </path>
                                    </svg></a></span>

                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Confirm Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control" placeholder="Password" autocomplete="off" value="" />
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
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>
                    <div class="mb-3">
                        <label class="form-check"><input type="checkbox" class="form-check-input" /><span
                                class="form-check-label">{{ __('Agree the') }}
                                <a tabindex="-1" href="syarat-dan-ketentuan">{{ __('terms and policy') }}</a>
                                .</span></label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Create new account') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                {{ __('Already have account?') }}
                <a tabindex="-1" href="{{ route('login') }}">{{ __('Sign in') }}</a>
            </div>
        </div>
    </div>
</x-guest-layout>
