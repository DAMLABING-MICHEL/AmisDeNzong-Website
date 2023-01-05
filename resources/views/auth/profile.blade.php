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
            <div class="">
                <!-- Name -->
                <div class="mt-2">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="Your name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required placeholder="Your email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
            </div>
            <div class="ml-5">
                <!-- Password -->
                <div class="mt-2">
                    <label for="password">Password (optional)</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password if you want to change it">
                </div>

                <!-- Confirm Password -->
                <div class="m-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password_confirmation" class="form-control" id="password" name="password_confirmation" placeholder="Confirm your Password">
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <x-auth.submit title="Save" />
        </div>
    </form>
</div>
@endsection