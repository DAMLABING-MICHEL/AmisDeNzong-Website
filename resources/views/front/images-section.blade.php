<div class="d-flex justify-content-center">
    <div class="col-md-8 text-center heading-section ftco-animate">
        <h2 class="mb-4"><span>@lang('Our Gallery')</span></h2>
        <p>@lang('Learn more about the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" by
            exploring our Image Gallery')</p>
        <div class="portfolio-menu mt-2 mb-4">
            <ul>
                <li class="btn btn-outline-danger active" data-filter="*">@lang('All')</li>
                @foreach ($rubrics as $rubric)
                <li class="btn btn-outline-danger" data-filter=".{{$rubric->title}}">{{$rubric->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="portfolio-item row d-flex justify-content-center">
    @if(@isset($kinderImages) && $kinderImages != null)
    @foreach($kinderImages as $index=>$kinderImage)
    <div class="item Kindergarten col-lg-3 col-md-4 col-6 col-sm">
        <a href="images/{{$kinderImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
            <img class="img-fluid" id="gallery-img" src="images/{{$kinderImage->url}}" alt="">
        </a>
    </div>
    @endforeach
    @endif
    @if(@isset($elementaryImages) && $elementaryImages != null)
    @foreach($elementaryImages as $index=>$elementaryImage)
    <div class="item Primary col-lg-3 col-md-4 col-6 col-sm">
        <a href="images/{{$elementaryImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
            <img class="img-fluid" id="gallery-img" src="images/{{$elementaryImage->url}}" alt="">
        </a>
    </div>
    @endforeach
    @endif
    @if(@isset($leisureImages) && $leisureImages != null)
    @foreach($leisureImages as $index=>$leisureImage)
    <div class="item Leisure col-lg-3 col-md-4 col-6 col-sm">
        <a href="images/{{$leisureImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
            <img class="img-fluid" id="gallery-img" src="images/{{$leisureImage->url}}" alt="">
        </a>
    </div>
    @endforeach
    @endif
</div>