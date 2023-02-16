<section class="ftco-section testimony-section bg-light">
	<div class="container">
		@if (@isset($testimonials))
		@foreach ($testimonials as $testimonial)
		<div class="modal fade" id="testifyModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">@lang('Testimonial')</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="#" id="testimonial-form">
							@csrf
							<div class="form-group">
								<label for="occupation">@lang('Occupation')</label>
								<input type="test" class="form-control" value="" name="occupation" id="occupation">
								<span id="error" style="color: red"></span>
							</div>
							<div class="form-group">
								<label for="content">@lang('Message')</label>
								<textarea class="form-control" name="content" id="content" rows="3"></textarea>
								<span id="error" style="color: red"></span>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn submit-button text-white"
									name="testimonial-store">@lang("submit")</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Testimonials')</span></h2>
				<p>@lang(' Some testimonies of people who are satisfied with the education of their children in the
					private Bilingual LAÏC school group "Les Amis De Nzong et Fondation Candia" ')</p>
				@if(!Auth::check())
				@lang('You can') <a href="{{ route('login') }}">@lang('login')</a> @lang('to leave a review')
				@else
				<a href="#" class="testify" data-toggle="modal" data-target="#testifyModal">@lang('Leave a review')</a>
				@endif
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
								@if(Auth::check())
								<div>
									@if(Auth::user()->name == $testimonial->name)
									<a href="#" data-name="{{ $testimonial->name }}"
										data-occupation="{{ $testimonial->feature }}"
										data-content="{{ $testimonial->content }}" data-id="{{ $testimonial->id }}"
										data-toggle="modal" data-target="#testifyModal" class="updateTestimony"
										id="update-testimony-btn">@lang('Update')</a>&nbsp;
									<a href="#" class="deleteTestimony" data-testimonial="{{ $testimonial }}" style="color:red" id="btn-delete-testimony">
										@lang('Delete')
									</a>
									@endif
								</div>
								@endif
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
	    var occupation = document.getElementById('occupation')
	    var content = document.getElementById('content')
	    var btnUpdate = document.getElementById('update-testimony-btn')
	    var btnDelete = document.getElementById('btn-delete-testimony')

// store testimonial
const storeTestimonial = async e => {              
    e.preventDefault();
    const datas = {
          occupation: occupation.value,
		  content: content.value,
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
    btnUpdate.addEventListener('click',function (e) {
    e.preventDefault()
			occupation.value = e.target.dataset.id
			content.innerHTML = e.target.dataset.content
	})
	const deleteTestimonial = async e => {
        e.preventDefault();
        Swal.fire({
            title: 'Really delete this Testimonial ? ',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            preConfirm: () => {
                return fetch(`testimonials/${e.target.dataset.testimonial}`, {
                        method: 'DELETE',
                        headers: headers
                    })
                    .then(response => {
                        if (response.ok) {
                            showAlert('infos','success','Your testimonial has been successfuly deleted')
                        } else {
                            errorAlert();
                        }
                    });
            }
        });
    }
    btnDelete.addEventListener('click',deleteTestimonial)
})()
</script>