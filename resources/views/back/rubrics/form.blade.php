@extends('back.layout')

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'rubrics.edit' ? route('rubrics.update', $rubric->id) : route('rubrics.store') }}">

    @if(Route::currentRouteName() === 'rubrics.edit')
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
                @foreach (config('app.locales') as $locale)
                <x-back.input title='Title {{ $locale }} of the rubric' name='title_{{ $locale }}' :value="isset($rubric) ? $rubric->title : ''"
                    input='text' :required="true">
                </x-back.input>
                @endforeach
                <x-back.input title='Description of the rubric' name='description'
                    :value="isset($rubric) ? $rubric->description : ''" input='textarea' :required="false">
                </x-back.input>
            </x-back.card>

            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
    </div>


</form>

@endsection

@section('js')

@endsection