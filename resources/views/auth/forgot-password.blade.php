@extends('front.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 forgot-password-form row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex flex-column align items-center justify-content-center">
                <!-- Session Status -->
                <x-auth.session-status :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth.validation-errors :errors="$errors" />
            </div>
            <div class="d-flex justify-content-center">
                <p class="">@lang('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')'</p>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <x-auth.input-email />
                <x-auth.submit title="Send" />
            </form>
        </div>
    </div>
</div>
@endsection