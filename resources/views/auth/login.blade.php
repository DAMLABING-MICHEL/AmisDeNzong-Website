@extends('front.app')
@section('content')
<div class="row d-flex flex-column align-items-center justify-content-center form-login justify-content-center">
    <div class="d-flex flex-column align items-center justify-content-center">
        <!-- Session Status -->
        <x-auth.session-status :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth.validation-errors :errors="$errors" />
        <h3 class="text-center">@lang('Login')</h3>
    </div>
    <div class="col-md-4">
        <form class="" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <x-auth.input-email />
            <!-- Password -->
            <x-auth.input-password />
            <!-- Remember Me -->
            <label class="">
                <input id="remember_me" type="checkbox" name="remember_me" {{ old('remember_me') ? 'checked' : '' }}>
                <span class="label-text">@lang('Remember me')</span>
            </label>
            <div class="row justify-content-center">
                <x-auth.submit title="Login" />
            </div>

            <div class="row justify-content-center">
                <label class="">
                    <a href="{{ route('password.request') }}" class="lb-link"> @lang('Forgot Your Password')?</a> /&nbsp;&nbsp;
                    <a href="{{ route('register') }}" style="float: right;" class="lb-link">@lang('Not registered')?</a>
                </label>
            </div>
        </form>
    </div>
</div>
@endsection