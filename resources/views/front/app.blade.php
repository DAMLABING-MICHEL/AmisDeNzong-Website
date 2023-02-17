<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('front.header')

<body>
    <div class="py-1 nav">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md-4 d-flex topper align-items-center">
                            <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center text-white">
                                <span class="icon-map"></span>
                            </div>
                            <span class="text text-white">@lang('BP.150 West Region, In Nzong-Foto Village')</span>
                        </div>
                        <div class="col-md-4 d-flex topper align-items-center">
                            <div
                                class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center text-white">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <span class="text text-white">contact@lesamisdenzong-fondationcandia.com</span>
                        </div>
                        <div class="col-md-3 d-flex topper align-items-center">
                            <div
                                class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center text-white">
                                <span class="icon-phone2"></span>
                            </div>
                            <span class="text text-white">+237 65 71 83 89 / 693 03 44 72</span>
                        </div>
                        <div class="class ml-4">
                            <div class="dropdown" style="display: inline-block;">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink78"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{config('app.locale')}}</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78">
                                    @foreach(config('app.locales') as $locale)
                                    @if($locale != session('lang'))
                                    <a class="dropdown-item" href="{{ url('locale/'.$locale) }}" id="lang-link">
                                        {{ $locale }}
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.nav')
    <!-- start subscribe confirmation modal -->
        <x-front.modal :modal="session('modal')" />
        <x-front.unsubscribe-modal :unsubscribe="session('unsubscribe')" />
    <!-- end subscribe confirmation modal -->
    @yield('content')

    @include('front.footer')
    
    @if (Auth::check())
    <button class="open-button" onclick="openForm()">@lang('Leave an review')</button>

    <div class="chat-popup" id="myForm">
      <form action="#" class="form-container" name="form-review-rating" id="review-form" method="post">
        <h4>@lang('Add testimonial')</h4>
        <div class="col">
            @csrf
            <div class="rate">
               <input type="radio" id="star5" class="rate" name="rating" value="5"/>
               <label for="star5" title="Excellent">5 stars</label>
               <input type="radio" id="star4" class="rate" name="rating" value="4"/>
               <label for="star4" title="Good">4 stars</label>
               <input type="radio" id="star3" class="rate" name="rating" value="3"/>
               <label for="star3" title="Ok">3 stars</label>
               <input type="radio" id="star2" class="rate" name="rating" value="2">
               <label for="star2" title="Poor">2 stars</label>
               <input type="radio" id="star1" class="rate" name="rating" value="1"/>
               <label for="star1" title="Bad">1 star</label>
            </div>
         </div>
        <label for="msg"><b>@lang('Message (optional)')</b></label>
        <textarea placeholder="Type message.." name="content"></textarea>
        <input type="hidden" value="{{ auth()->user()->name }}" id="name">
        <button type="submit" class="btn">@lang('Send')</button>
        <button type="button" class="btn cancel" onclick="closeForm()">@lang('Close')</button>
      </form>
    </div> 
    @endif
    <script>
    (() => {
        // Variables
		const headers = {
		    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
		    'Content-Type': 'application/json',
		    'Accept': 'application/json'
		}
        var rating = document.forms["form-review-rating"]["rating"]
        var content = document.forms["form-review-rating"]["content"]
        var name = document.getElementById('name')
        const storeReview = async e => {              
    e.preventDefault();
    const datas = {
        name:name.value,
        rating:rating.value,
        content:content.value
    };
	
        const response = await fetch(`{{ route('testimonial.store') }}`, { 
            method: 'POST',
            headers: headers,
            body: JSON.stringify(datas)
         })
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
        if (response.ok) {
            showAlert('infos','success','Your review has been submitted Successfully. Thanks!')
        } else {
            if (response.status == 422) {
                showAlert('error','error','please select at least one star before submitting the form!')

            } else {
                errorAlert();
            }
        }
}
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
        wrapper('#review-form', 'submit', storeReview);
    })
    })()
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
</body>

</html>