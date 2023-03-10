<div class="row d-flex justify-content-center">
    @if(@isset($posts))
    @foreach($posts as $index=>$post)
    <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
            @if (!@empty($post->image))
            <a href="{{ url('blog-single/'.$post->slug)}}" class="block-20 d-flex align-items-end" style="background-image: url('{{ getImage($post) }}');">
                <div class="meta-date text-center p-2">
                    <span class="day">{{ strftime('%d', strtotime($post->created_at)) }} </span>
                    <span class="mos">{{ \carbon\carbon::parse($post->created_at)->isoFormat('MMMM')  }}</span>
                    <span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
                </div>
            </a>
            @endif
            <div class="text p-4">
                <h3 class="heading"><a href="{{ url('blog-single/'. $post->slug)}}">{{$post->title}}</a></h3>
                <small class="">@lang('Written on') {{ \carbon\carbon::parse($post->created_at)->isoFormat('LL') }} @lang('By') {{$post->user->name}}</small>
                <p>{!! substr($post->summary,0,100) !!}...</p>
                <div class="d-flex align-items-center mt-4">
                    <p class="mb-0"><a href="{{ url('blog-single/'. $post->slug)}}" class="btn">@lang('Read More') <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto mb-0">
                        @if($post->valid_comments_count)
                        <span class="meta-chat blog-username"><span class="icon-chat"></span>{{ $post->valid_comments_count }}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>