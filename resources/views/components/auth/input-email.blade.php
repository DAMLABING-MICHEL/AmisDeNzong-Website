@props(['email' => ''])
<div class="mt-4">
  <label for="email">Email</label>  
  <input 
  type="email" 
  class="form-control" 
  id="email"
  name="email"
  value="{{ old('email', $email) }}"
  required 
      autofocus
  placeholder="Your email" 
  aria-describedby="emailHelp" 
  placeholder="Enter email">
</div>