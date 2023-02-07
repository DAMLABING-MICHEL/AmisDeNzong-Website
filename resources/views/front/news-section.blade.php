<div class="row justify-content-center">
    @if(@isset($news))
    @foreach($news as $indes=>$newsSingle )
    <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
            @if(!@empty($newsSingle->image))
            <a href="{{url('news-single/'.$newsSingle->id)}}" class="block-20 d-flex align-items-end" style="background-image: url('{{ getImage($newsSingle)}}');">
            @endif
            </a>
            <div class="text bg-white p-4">
                <h3 class="heading"><a href="{{url('news-single/'.$newsSingle->id)}}">{{$newsSingle->title}}</a></h3>
                <p>{!! substr($newsSingle->summary,0,100) !!}...</p>
                <div class="d-flex align-items-center mt-4">
                    <p class="mb-0"><a href="{{ url('news-single/'.$newsSingle->id)}}" class="btn">@lang('Read More') <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>