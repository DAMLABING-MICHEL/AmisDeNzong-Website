@props(['email' => ''])
<div class="mt-4">
  <label for="email">@lang('Email')</label>  
  <input 
  type="email" 
  class="form-control" 
  id="email"
  name="email"
  value="{{ old('email', $email) }}"
  required 
      autofocus
  placeholder="@lang('Your email')" 
  aria-describedby="emailHelp">
  <div id="errorEmail"></div>
</div>