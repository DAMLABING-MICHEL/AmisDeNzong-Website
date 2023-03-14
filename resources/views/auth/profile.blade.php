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
    <form class="h-add-bottom" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="form-group col-md-6" id="content-avatar">
                {{-- <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label> --}}

                <div class="col-md-6">
                    <img src="{{ getAvatar(Auth::user()) }}" class="rounded-circle"
                        style="width:80px;margin-top: 10px;">
                </div>
               <div>
                 <!--default html file upload button-->
                 <input type="file" id="avatar-btn" name="avatar" hidden />

                 <!--our custom file upload button-->
                 <label for="avatar-btn" class="lbl-avatar"> <span class="icon-upload"></span> @lang('Upload')</label>
                 <!-- name of file chosen -->
                 <span id="avatar-chosen">@lang('Update Image (optional)')</span>
               </div>
            </div>
            <div class="form-goup">

            </div>
        </div>

        <div class="d-flex row justify-content-center">
            <div class="col-md-4">
                <!-- Name -->
                <div class="mt-2">
                    <label for="name">@lang('Name')</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="@lang('Your name')"
                        value="{{ old('name', auth()->user()->name) }}" required autofocus>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">@lang('Email')</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', auth()->user()->email) }}" required placeholder="@lang('Your email')"
                        aria-describedby="emailHelp">
                </div>
            </div>
            <div class="ml-5 col-md-4">
                <!-- Password -->
                <div class="mt-2">
                    <label for="password">@lang('Password (optional)')</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="@lang('Your Password if you want to change it')">
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">@lang('Confirm Password')</label>
                    <input type="password_confirmation" class="form-control" id="password" name="password_confirmation"
                        placeholder="@lang('Confirm your Password')">
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <x-auth.submit title="Save" />
        </div>
    </form>
</div>
@endsection