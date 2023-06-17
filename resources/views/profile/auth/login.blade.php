@extends('frontend.layout.layout')
@section('title') Giriş Yap @endsection
@section('login_register')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div  style="margin-left: 300px" class="col-md-7 ">
        <hr>
        <h2 class="text-lg-center h3 mb-3 text-black">Giriş Yap</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <input id="password" class="form-control"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Beni Hatırla') }}</span>
            </label>
        </div>

        <div style="margin-left: 25%" class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Şifreni mi unuttun?
                </a>
            @endif


                <input type="submit" class="btn btn-success" value="Giriş Yap">

        </div>
    </form>
    </div>
    <hr>

@endsection
