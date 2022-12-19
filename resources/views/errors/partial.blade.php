<h1>{{ __( $number . ' error ') }}</h1>
<p class="lead">{{ __($info) }}</p>
@if($number != '503')
    <p class="lead">
        <a href="{{ url('/') }}" class="btn btn--primary">{{ __('Home') }}</a>
    </p>
@endif