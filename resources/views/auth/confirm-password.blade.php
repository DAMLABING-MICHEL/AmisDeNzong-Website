@extends('front.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="form-profile">          

            <p class="h-add-bottom">@lang('This is a secure area of the application. Please confirm your password before continuing.')</p>

            <!-- Validation Errors -->
            <x-auth.validation-errors :errors="$errors" />

            <form class="h-add-bottom" method="POST" action="{{ route('password.confirm') }}">
                @csrf                

                <!-- Password -->
                <x-auth.input-password />

                <x-auth.submit title="Confirm" />              
            </form>
        </div>
    </div>

@endsection