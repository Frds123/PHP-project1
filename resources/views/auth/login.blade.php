<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img src="{{ asset('ui/frontend-ui/assets') }}/img/nub.png">
                <p>Don't have an account yet? <a class="ml-2 text-danger" href="{{ route('register') }}">Sign Up</a></p>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <x-text-input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <div class="mb-3">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot password') }}</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            {{-- <x-primary-button class="btn btn-primary">
                {{ __('Login') }}
            </x-primary-button> --}}

            {{-- <div class="foot">
                <p>Or connect with</p>
                <ul>
                    <li><a href="#" class="linkedin" target="_blank"><i data-feather="mail"></i></a></li>
                    <li><a href="#" class="facebook" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="#" class="twitter" target="_blank"><i data-feather="twitter"></i></a></li>
                </ul>
            </div> --}}
            {{-- <div class="foot">
                <p>Have no account? <a href="{{ route('register') }}">{{ __("Register") }}</a></p>
            </div> --}}
        </form>
    </x-auth-card>
</x-guest-layout>
