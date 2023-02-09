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
              <x-back.card type='primary' title='Feature {{ $locale }} of testifying'>
                <x-back.input name='feature_{{ $locale }}' :value="isset($testimonial) ? $testimonial->getTranslation('feature',$locale) : ''" input='text'
                    :required="true">
                </x-back.input>
              </x-back.card>
              <x-back.card type='primary' title='Content {{ $locale }} of testifying'>
                <x-back.input name='testimonial_content_{{ $locale }}' :value="isset($testimonial) ? $testimonial->getTranslation('content',$locale) : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <x-back.card type='primary' :outline="false" title='Image'>

                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($testimonial)
                    <img style="width:100%;" src="{{ getImage($testimonial, true) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button">Button</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($testimonial) ? getImage($testimonial, true) : '') }}" required>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId" value="{{ old('image', isset($testimonial) && !empty($testimonial->image) ? $testimonial->image->id : '') }}" hidden>
                    @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                    @endif
                </div>


            </x-back.card>
            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>

    </div>


</form>
@endsection

@section('js')

@include('back.shared.editorScript')
@endsection