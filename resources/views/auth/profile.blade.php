@extends('front.app')

@section('content')
<div class="form-profile">
    <div class="d-flex flex-column align items-center justify-content-center">
        <!-- Session Status -->
        <x-auth.session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth.validation-errors :errors="$errors" />

        <h3 class="text-center">@lang('Profile')</h3>
    </div>
    <form class="h-add-bottom" method="POST" action="{{ route('profile') }}">
        @csrf
        @method('PUT')

        <div class="d-flex row justify-content-center">
            <div class="col-md-4">
                <!-- Name -->
                <div class="mt-2">
                    <label for="name">@lang('Name')</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="@lang('Your name')" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">@lang('Email')</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required placeholder="@lang('Your email')" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="ml-5 col-md-4">
                <!-- Password -->
                <div class="mt-2">
                    <label for="password">@lang('Password (optional)')</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('Your Password if you want to change it')">
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">@lang('Confirm Password')</label>
                    <input type="password_confirmation" class="form-control" id="password" name="password_confirmation" placeholder="@lang('Confirm your Password')">
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <x-auth.submit title="Save" />
        </div>
    </form>
</div>
@endsection