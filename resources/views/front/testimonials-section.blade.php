<section class="ftco-section testimony-section bg-light">
	@if (@isset($testimonials) && count($testimonials) > 0)
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Testimonials')</span></h2>
				<p>@lang(' Some testimonies from people who are satisfied with the education of their children at the
					Groupe Scolaire Bilingue Privé LaÏc "Les Amis De Nzong et Fondation Candia". ')</p>
			</div>
		</div>
		<div class="row ftco-animate justify-content-center">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					@foreach($testimonials as $index=>$testimonial)
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img mr-4"
								style="background-image: url({{ getAvatar($testimonial->user) }});">
							</div>
							<div class="text ml-2 bg-light">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
								<p>{{$testimonial->content}}</p>
								<p class="name">{{$testimonial->name}}</p>
								<p>
								<div class="form-group row">
									<div class="col">
										<div class="rated">
											@for($i = 0; $i < $testimonial->rating; $i++)
												<input type="radio" id="star_{{$i}}" class="rate" name="rating"
													value="5" />
												<label class="star-rating-complete" title=""> {{$i}} stars</label>
												@endfor
										</div>
										@for($i = 0; $i < 5-($testimonial->rating); $i++)
											<span class="rate">
												<input type="radio" id="star5" class="rate" name="rating"
													value="5" />
												<label for="star5" title="@lang('Excellent')">5 stars</label>
											</span>
										@endfor
									</div>
								</div>
								</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@endif
</section>