@props(['comment'])

<ul class="comment-list">
    <li class="comment">
        <div class="vcard bio">
           <img src="{{ Gravatar::get($comment->user->email) }}" alt="Image placeholder">
        </div>
        <div class="comment-body">
            <h3>{{ $comment->user->name}}</h3>
            <div class="meta mb-2">
            <span class="test-uppercase">{{ strftime('%B,', strtotime($comment->created_at)) }}</span>
            <span> {{ strftime('%m', strtotime($comment->created_at)) }} </span> 
            <span> {{ strftime('%Y', strtotime($comment->created_at)) }} </span> 
            <span> at {{ $comment->created_at->format('h:i:s A') }} </span>
            </div>
            <p>{{ $comment->content}} </p>
            @if(Auth::check())
            <p>
                @if($comment->depth < config('app.commentsNestedLevel')) 
                <a href="#" data-name="{{ $comment->user->name }}" data-id="{{ $comment->id }}" class="reply replycomment">@lang('Reply')</a>&nbsp;
                @endif
                @if(Auth::user()->name == $comment->user->name)
                <a href="#" class="comment-reply-link deletecomment" style="color:red">
                    @lang('Delete')
                </a>
                @endif
                @endif
            </p>
        </div>
        <ul class="children">
            <x-front.comments :comments="$comment->children" />
        </ul>
        <input type="text" value="{{$comment->id}}" id="getComment" hidden>
        <input type="text" value="{{url('/blog-single/comments')}}" id="getUrl" hidden>
    </li>
</ul>