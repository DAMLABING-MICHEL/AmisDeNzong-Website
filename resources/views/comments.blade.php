    <h3 class="text-center">@lang('Comments')</h3>
<!-- Commentlist -->
<ol class="commentlist">
  <x-front.comments :comments="$comments" />
</ol>
@if(Auth::guest())
<span>@lang('You must be connected to add a comment or reply.') <a href="{{route('login')}}">@lang('Login')</a></span>
@endif