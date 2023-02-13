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
                <x-back.input title='Title of the feature' name='title' :value="isset($feature) ? $feature->title : ''"
                    input='text' :required="true">
                </x-back.input>
                <x-back.input title='Description' name='description' :value="isset($feature) ? $feature->description : ''"
                    input='textarea' :required="false">
                </x-back.input>
            </x-back.card>

            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
    </div>


</form>

@endsection

@section('js')

@endsection