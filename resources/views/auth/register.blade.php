{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('frontend.index_master')
@section('frontend')
    <!-- ---------------------------------------------------- log/Register Section ------------------------- ------------ -->
    <section class="loginRegisterSection">
        <div class="loginRegisterLayer">
            <div class="loginRegisterBox">
                <h2>Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input placeholder="Organization Name" class="input" name="name" type="text" />
                    <input placeholder="Phone Number" class="input" name="phone_number" type="number" />
                    <input placeholder="Email Id" class="input" name="email" type="email" />
                    <input placeholder="Password" class="input" name="password" type="password" />
                    <input placeholder="Confirm Password" class="input" name="password_confirmation" type="password" />
                    <input class="submit" type="submit" value=" {{ __('Register') }}">

                    <p>Already have account? <a href="login.html"><b>Login</b></a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
