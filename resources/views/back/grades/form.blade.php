@extends('back.layout')

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'grades.edit' ? route('grades.update', $grade->id) : route('grades.store') }}">

    @if(Route::currentRouteName() === 'grades.edit')
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
                <x-back.input title='Title of the grade' name='title' :value="isset($grade) ? $grade->title : ''"
                    input='text' :required="true">
                </x-back.input>
                <x-back.input title='Description' name='description' :value="isset($grade) ? $grade->description : ''"
                    input='textarea' :required="false">
                </x-back.input>
                <x-back.input name='hight_grade' :value="isset($grade) ? $grade->hight_grade: ''" input='checkbox'
                    label="Hight_grade">
                </x-back.input>
            </x-back.card>

            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
    </div>


</form>

@endsection

@section('js')

@endsection