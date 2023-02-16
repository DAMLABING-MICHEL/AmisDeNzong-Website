<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Testimonials')</span></h2>
				<p>@lang(' Some testimonies of people who are satisfied with the education of their children in the
					private Bilingual LAÏC school group "Les Amis De Nzong et Fondation Candia" ')</p>
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
							<div class="user-img mr-4" style="background-image: url({{ getImage($testimonial) }});">
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
<script>
	(()  => {
		// Variables
		const headers = {
		    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
		    'Content-Type': 'application/json',
		    'Accept': 'application/json'
		}

// store testimonial
const storeTestimonial = async e => {              
    e.preventDefault();
    const datas = {
    };
	
        const response = await fetch(`{{ route('testimonial.store') }}`, { 
            method: 'POST',
            headers: headers,
            body: JSON.stringify(datas)
         })
            // Wait for response
        const data = await response.json();
        const showAlert = (icon, title, text) => Swal.fire({
        icon: icon,
        title: title,
        text: text,
        });
        const errorAlert = () => Swal.fire({
        icon: 'error',
        title: 'Whoops!',
        text: 'Something went wrong'
        });
        // Manage response
        if (response.ok) {
            showAlert('infos', 'success', 'Thank you for your testimony, it has been well recorded, please refresh the page to view it');
        } else {
            if (response.status == 422) {
                $.each(data.errors, function (i, error) {
                    $('form')
                        .find('[name="' + i + '"]')
                        .addClass('input-invalid')
                        .next()
                        .append(error[0]);
                });
            } else {
                errorAlert();
            }
        }
}
    	// Listener wrapper
	const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
	    const element = document.querySelector(selector);
	    if(element) {
	        document.querySelector(selector).addEventListener(type, e => { 
	            if(eval(condition)) {
	                callback(e);
	            }
	        }, capture);
	    }
	};
	window.addEventListener('DOMContentLoaded', () => {
        wrapper('#testimonial-form', 'submit', storeTestimonial);
    })
})()
</script>