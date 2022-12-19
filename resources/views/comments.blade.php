    <h3 class="text-center">Comments</h3>
<!-- Commentlist -->
<ol class="commentlist">
  <x-front.comments :comments="$comments" />
</ol>
@if(Auth::guest())
<span>You must be connected to add a comment or reply. <a href="{{route('login')}}">login</a></span>
@endif