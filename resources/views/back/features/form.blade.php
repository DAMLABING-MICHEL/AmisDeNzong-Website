@extends('back.layout')

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'features.edit' ? route('features.update', $feature->id) : route('features.store') }}">

    @if(Route::currentRouteName() === 'features.edit')
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
                <x-back.input title='Title {{ $locale }} of the Occupation' name='title_{{ $locale }}' :value="isset($feature) ? $feature->getTranslation('title',$locale) : ''"
                    input='text' :required="true">
                </x-back.input>
                @endforeach
                <x-back.input title='Description' name='description' :value="isset($feature) ? $feature->description : ''"
                    input='textarea' :required="false">
                </x-back.input>
            </x-back.card>

            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

        </div>
    </div>


</form>

@endsection

@section('js')
@include('back.shared.editorScript')
@endsection