@extends('front.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8 row justify-content-center">
        <div class="col-md-4">
            <div class="d-flex flex-column align items-center">
                <!-- Session Status -->
                <x-auth.session-status :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth.validation-errors :errors="$errors" />
                <h3 class="text-center mt-2">@lang('Password reset')</h3>
            </div>
            <form class="" method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- <div class="d-flex row justify-content-center"></div> -->
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!-- Email Address -->
                <x-auth.input-email :email="$request->email" />
                <!-- Password -->
                <x-auth.input-password />
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">@lang('Confirm Password')</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm your Password" required>
                </div>
                <!-- Remember Me -->
                <label class="">
                    <input id="remember_me" type="checkbox" name="remember_me" {{ old('remember_me') ? 'checked' : '' }}>
                    <span class="label-text">@lang('Remember me')</span>
                </label>
                <x-auth.submit title="Reset Password" />
            </form>
        </div>
    </div>
</div>
@endsection