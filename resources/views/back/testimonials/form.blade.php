@extends('back.layout')

@section('css')
<style>
    #holder img {
        height: 100%;
        width: 100%;
    }
</style>
@endsection

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'testimonials.edit' ? route('testimonials.update', $testimonial->id) : route('testimonials.store') }}">

    @if(Route::currentRouteName() === 'testimonials.edit')
    @method('PUT')
    @endif

    @csrf

    <div class="row">
        <div class="col-md-12">

            <x-back.validation-errors :errors="$errors" />

            @if(session('ok'))
            <x-back.alert type='success' title="{!! session('ok') !!}">
            </x-back.alert>
            @endif

            <x-back.card type='primary' title='Name of testifying'>
                <x-back.input name='name' :value="isset($testimonial) ? $testimonial->name : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @foreach (config('app.locales') as $locale)
            <x-back.card type='primary' title='Content {{ $locale }} of testimonial'>
                <x-back.input name='testimonial_content_{{ $locale }}'
                    :value="isset($testimonial) ? $testimonial->getTranslation('content',$locale) : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

        </div>

    </div>


</form>
@endsection

@section('js')

@include('back.shared.editorScript')
@endsection