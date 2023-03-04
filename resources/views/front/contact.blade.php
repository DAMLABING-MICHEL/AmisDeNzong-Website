@extends('front.app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/contact-bg.jpg')}});">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">@lang('Contact Us')</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">@lang('Home') <i
                class="ion-ios-arrow-forward"></i></a></span> <span>@lang('Contact') <i
              class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-3 d-flex">
        <div class="bg-light align-self-stretch box p-4 text-center">
          <h3 class="mb-4">@lang('Address')</h3>
          <p>@lang('BP.150 West Region, In Nzong-Foto Village')</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="bg-light align-self-stretch box p-4 text-center">
          <h3 class="mb-4">@lang('Contact Number')</h3>
          <p>+237 65 71 83 89 / 693 03 44 72</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="bg-light align-self-stretch box p-4 text-center">
          <h3 class="mb-4">@lang('Email Address')</h3>
          <p>contact@lesamisdenzong-fondationcandia.com</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="bg-light align-self-stretch box p-4 text-center">
          <h3 class="mb-4">@lang('Website')</h3>
          <p><a href="#">lesamisdenzong-fondationcandia.com</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
  <div class="container">
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
    @endif
    <div class="row d-flex align-items-stretch no-gutters">
      <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
        <!-- CROSS Site Request Forgery Protection -->
        <form method="post" action="{{ route('contact.store') }}">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control  {{ $errors->has('name') ? 'error' : '' }}"
              placeholder="@lang('Your Name')" name="name" id="name">
            <!-- Error -->
            @if($errors->has('name'))
            <div class="error">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
              placeholder="@lang('Your Email')" name="email" id="email">
            <!-- Error -->
            @if($errors->has('email'))
            <div class="error">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}"
              placeholder="@lang('Subject')" name="subject" id="subject">
            <!-- Error -->
            @if($errors->has('subject'))
            <div class="error">
              {{ $errors->first('subject') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <textarea id="" cols="30" rows="7" class="form-control {{ $errors->has('message') ? 'error' : '' }}"
              placeholder="Message" name="message" id="message"></textarea>
            <!-- Error -->
            @if($errors->has('message'))
            <div class="error">
              {{ $errors->first('message') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <input type="submit" value="@lang('Send Message')" name="send" class="btn py-3 px-5 text-white" id="send">
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <h1>@lang('Location map')</h1>
      </div>
      <div class="col-md-6 d-flex align-items-stretch">
        <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.672530384141!2d10.067748199999999!3d5.4665553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc1e880724f995de4!2sGroupe%20Scolaire%20Bilingue%20Priv%C3%A9%20LA%C3%8FC%20%22LES%20AMIS%20DE%20NZONG%20%26%20FONDATION%20CANDIA%22!5e0!3m2!1sfr!2scm!4v1673970859000!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
    </div>
  </div>
</section>
@endsection