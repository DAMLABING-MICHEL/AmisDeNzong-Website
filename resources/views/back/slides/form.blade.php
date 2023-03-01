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
    action="{{ Route::currentRouteName() === 'slides.edit' ? route('slides.update', $slide->id) : route('slides.store') }}">

    @if(Route::currentRouteName() === 'slides.edit')
    @method('PUT')
    @endif

    @csrf

    <div class="row">
        <div class="col-md-8">
            <x-back.validation-errors :errors="$errors" />

            @if(session('ok'))
            <x-back.alert type='success' title="{!! session('ok') !!}">
            </x-back.alert>
            @endif


            <x-back.card type='primary' title='Description'>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach(config('app.locales') as $locale)
                    <li class="nav-item">
                        <a class="nav-link {{ $locale == App::getLocale() ? 'active' :'' }}"
                            id="pills-{{ $locale }}-tab" data-toggle="pill" href="#pills-description-{{ $locale }}"
                            role="tab" aria-controls="pills-{{ $locale }}" aria-selected="false">{{ $locale }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach (config('app.locales') as $locale)
                    <div class="tab-pane fade {{ $locale == App::getLocale() ? 'show active' :'' }}"
                        id="pills-description-{{ $locale }}" role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">
                        <x-back.input name='description_{{ $locale }}'
                            :value="isset($slide) ? $slide->getTranslation('description',$locale) : ''" input='textarea'
                            :required="true">
                        </x-back.input>
                    </div>
                    @endforeach
                </div>
            </x-back.card>
            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

        </div>
        
        <div class="col-md-4">
            <x-back.card type='primary' :outline="false" title='Image'>

                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($slide)
                    <img style="width:100%;" src="{{ getImage($slide, true) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button"><i class="fa fa-upload"></i>
                            @lang('Upload')</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($slide) ? getImage($slide, true) : '') }}" required
                        hidden>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId"
                        value="{{ old('image', isset($slide) && !empty($slide->image) ? $slide->image->id : '') }}" hidden>
                    @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                    @endif
                </div>


            </x-back.card>
        </div>

    </div>

</form>
@endsection

@section('js')
@include('back.shared.editorScript')
@endsection