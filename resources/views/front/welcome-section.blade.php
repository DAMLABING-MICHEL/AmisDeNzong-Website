<section class="ftco-section ftco-no-pt ftc-no-pb">
	<div class="container">
		<div class="row">
			<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
				<div class="text px-4 ftco-animate">
					<h2 class="mb-4">@lang('Welcome to Groupe Scolaire Bilingue Privé LAÏC "Les Amis De Nzong & Fondation Candia"')</h2>
					<p>@lang('The Bilingual Private School Group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" is a unique and innovative school, consisting of a Bilingual Preschool and Primary School as well as an Anglophone Section for a Quality Education for your children.')</p>
					<p>@lang('Created in September 2016, the Bilingual Private School Group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" is located in the Nzong Village in front of the Bilingual High School of Toula - Nzong..')</p>
					@request('/')
					<p><a href="{{ url('about')}}" class="btn px-4 py-3 text-white">@lang('Read More')</a></p>
					@endrequest
					{{-- show more details in About Us page --}}
					@request('about')
					<p>@lang('Thus, the Bilingual Private School Group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" focuses its services on:')</p>
					<p>@lang('-The quality of teaching: The courses are given in French and English in the Bilingual System and only in English in the Anglophone System. The school also offers Basic Training in Italian and Computer Science.')</p>
					<p>@lang('The quality of the staff: A dynamic, talented and experienced team of people is available for the training and success of your children.')</p>
					<p>@lang('-The quality of the environment: Recreation is within a secure compound.')</p>
					<p>@lang('Transportation of students: A staff is in place to transport your children to and from school.')</p>
					<p>@lang('With our motto "LOVE - WORK - PERSEVERANCE", we emphasize the importance of the children\'s well-being. we focus on the quality of education and the success of the children is our priority.')</p>
					<p>@lang('Les Amis de Nzong and Fondation Candia " is a unique school for the development of your children.')</p>
					@endrequest
				</div>
			</div>
			<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
				<h2 class="mb-4">@lang('What We Offer')</h2>
				<p>@lang('we have an English and Bilingual kindergarten and Primary school for a higher quality studies.')</p>
				<div class="row mt-5">
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
							<div class="text">
								<h3>@lang('Safety First')</h3>
								<p>@lang('The school is in a clean, calm and secure area.')</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
							<div class="text">
								<h3>@lang('Kindergarten education')</h3>
								<p>@lang('From preschool to kindergarten, classes are taught in French and English in the Bilingual system and only in English in the Anglophone system.')</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
							<div class="text">
								<h3>@lang('Primary education')</h3>
								<p>@lang('In Primary education, classes are taught in French and English in the Bilingual system and only in English in the Anglophone system.')</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
							<div class="text">
								<h3>@lang('Basic courses in Italian and Computer Science')</h3>
								<p>@lang('The lessons also offers basic training in Italian language and computer science..')</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon icon-bus"></span></div>
							<div class="text">
								<h3>@lang('Pupil transport bus')</h3>
								<p>@lang('A staff is in place to transport your children to and from school.')</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
							<div class="text">
								<h3>@lang('Sports Facilities')</h3>
								<p>@lang('Leisure activities are inside a secure environment.')</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Certified')</span> @lang('Teachers')</h2>
				<p>@lang("A dynamic, talented and experienced team of staff is here to take care of your children's education.")</p>
			</div>
		</div>
		<div class="row justify-content-center">
			@if(@isset($certifiedTeachers))
			@foreach($certifiedTeachers as $index=>$certifiedTeacher)
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img-wrap d-flex align-items-stretch">
						@if(!@empty($certifiedTeacher->image))
						<div class="img align-self-stretch" id="teacher-img" style="background-image: url(images/{{$certifiedTeacher->image->url}});"></div>
						@endif
						<div class="card-img-overlay card-image-description">
							<div>
								<p class="">{{$certifiedTeacher->description}}</p>
							</div>
							<ul class="ftco-social text-center">
								@foreach ($certifiedTeacher->follows()->get() as $follow)
									<li class="ftco-animate"><a href="#" class="icon-follow"><span class="icon-{{$follow->title}}"></span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="text pt-3 text-center">
						<h3>{{$certifiedTeacher->lastName}}</h3>
						<span class="position mb-2">{{$certifiedTeacher->position}}</span>
					</div>
				</div>
			</div>
			@endforeach
			@endif

		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/images/bg_4.jpg);" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
				<h2 class="mb-4"><span>@lang('7 Years of')</span> @lang('Experience')</h2>
				<p>@lang('To this day, the Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" is full of')</p>
			</div>
		</div>
		<div class="row d-md-flex align-items-center justify-content-center">
			<div class="col-lg-10">
				<div class="row d-md-flex align-items-center justify-content-center">
				@if (@isset($numbers))
						@foreach ($numbers as $number)
						<div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18">
								<div class="icon"><span class="flaticon-doctor"></span></div>
								<div class="text">
									<strong class="number" data-number="{{$number->value}}">0</strong>
									<span>{{$number->title}}</span>
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