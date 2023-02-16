@extends('back.layout')

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'images.edit' ? route('images.update', $image->id) : route('images.store') }}">

    @if(Route::currentRouteName() === 'images.edit')
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

            <x-back.card type='info' :outline="true" title=''>
                @foreach (config('app.locales') as $locale )
                <x-back.input title='Title {{ $locale }} of the image' name='title_{{ $locale }}'
                    :value="isset($image) && !empty($image->getTranslation('title',$locale)) ? $image->getTranslation('title',$locale) : ''" input='text' :required="true">
                </x-back.input>
                @endforeach
                <x-back.input title='Rubric' name='rubric' :value="isset($image) && $image->rubric ? $image->rubric->title : ''" input='select'
                    :options="$rubrics" :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' :outline="false" title='url of the image'>
                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($image)
                    <img style="width:100%;" src="{{ getImage($image, false,true) }}" alt="">
                    @endisset
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button">
                            <i class="fa fa-upload"></i> @lang('Upload')</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                        type="text" name="image"
                        value="{{ old('image', isset($image) ? getImage($image,false, true) : '') }}" required>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId" value="{{ old('image', isset($image) && !empty($image) ? $image->id : '') }}"
                        hidden>
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

<script>
    (() =>{
        $('form').submit(function (event) {
            if ($(this).hasClass('submitted')) {
                event.preventDefault();
            }
            else {
                $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
                $(this).addClass('submitted');
                document.getElementById("submit").disabled = true;
            }
    });  
    })
    </script>

@endsection