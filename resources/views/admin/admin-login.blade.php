@extends('frontend.index_master')
@section('frontend')
    <section class="loginRegisterSection">
        <div class="loginRegisterLayer">
            <div class="loginRegisterBox">
                <h2>Admin Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="role_type" value="admin">
                    <input placeholder="Email Id" class="input" name="email" type="email" />
                    <input placeholder="Password" class="input" name="password" type="password" />
                    <a href=""><i>Forget Password?</i></a>
                    <input class="submit" name="submit" type="submit" value="{{ __('Log in') }}">
                </form>
            </div>
        </div>
    </section>
@endsection
