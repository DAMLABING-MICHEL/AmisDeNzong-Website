<h1>@lang('Email Verification Mail')</h1>
  
@lang('Please verify your email with bellow link: ')
<a href="{{ route('user.verify', $token) }}">@lang('Verify Email')</a>