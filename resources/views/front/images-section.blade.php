<div class="d-flex justify-content-center">
    <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4"><span>@lang('Our Gallery')</span></h2>
        <p>@lang('Learn more about the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" by exploring our Image Gallery')</p>
        <div class="portfolio-menu mt-2 mb-4">
            <ul>
                <li class="btn btn-outline-danger active" data-filter="*">@lang('All')</li>
                @foreach ($rubrics as $rubric)
                @if ((count($rubric->images()->get())) > 0)
                <li class="btn btn-outline-danger" data-filter=".{{ $rubric->title }}">{{ $rubric->title }}</li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="portfolio-item row justify-content-center">
    @foreach ($rubrics as $rubric)
    @foreach ($rubric->images()->get() as $image)
    <div class="item {{ $rubric->title  }} col-lg-3 col-md-4 col-6 col-sm">
        <a href="{{ getImage($image,false,true)}}" class="fancylight popup-btn" data-fancybox-group="light">
            <img class="img-fluid" id="gallery-img" src="{{getImage($image,false,true)}}" alt="">
        </a>
    </div>
    @endforeach
    @endforeach
</div>