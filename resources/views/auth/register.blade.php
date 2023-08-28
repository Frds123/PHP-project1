<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('ui/frontend-ui/assets') }}/img/nub.png">
                <p>Create a New Account</a></p>
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label class="form-label">E-mail</label>

                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone No -->
            <div class="mb-3">
                <label class="form-label">Phone No</label>

                <x-text-input id="phone_no" class="form-control" type="phone_no" name="phone_no" :value="old('phone_no')" required />

                <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            {{-- <div class="foot">
                <p>Or connect with</p>
                <ul>
                    <li><a href="#" class="linkedin" target="_blank"><i data-feather="mail"></i></a></li>
                    <li><a href="#" class="facebook" target="_blank"><i
                                data-feather="facebook"></i></a></li>
                    <li><a href="#" class="twitter" target="_blank"><i
                                data-feather="twitter"></i></a></li>
                </ul>
            </div> --}}
            <div class="foot">
                <p>Already have an account yet? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
