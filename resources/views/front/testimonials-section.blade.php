<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Testimonials')</span></h2>
				<p>@lang(' Some testimonies of people who are satisfied with the education of their children in the private Bilingual LAÏC school group "Les Amis De Nzong et Fondation Candia" ')</p>
			</div>
		</div>
		<div class="row ftco-animate justify-content-center">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					@if(@isset($testimonials))
					@foreach($testimonials as $index=>$testimonial)
					<div class="item">
						<div class="testimony-wrap d-flex">
							@if(@isset($testimonial->image))
							<div class="user-img mr-4" style="background-image: url(images/{{$testimonial->image->url}});">
							</div>
							@endif
							<div class="text ml-2 bg-light">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
								<p>{{$testimonial->content}}</p>
								<p class="name">{{$testimonial->name}}</p>
								<span class="position">{{$testimonial->feature}}</span>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>