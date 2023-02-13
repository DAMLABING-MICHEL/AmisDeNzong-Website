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
    action="{{ Route::currentRouteName() === 'events.edit' ? route('events.update', $event->id) : route('events.store') }}">

    @if(Route::currentRouteName() === 'events.edit')
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
            @foreach (config('app.locales') as $locale)
            <x-back.card type='primary' title='Title {{ $locale }} of the event'>
                <x-back.input name='title_{{ $locale }}' :value="isset($event) ? $event->getTranslation('title',$locale) : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Summary {{ $locale }} of the event'>
                <x-back.input name='summary_{{ $locale }}' :value="isset($event) ? $event->getTranslation('summary',$locale) : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Content {{ $locale }} of the event'>
                <x-back.input name='description_{{ $locale }}' :value="isset($event) ? $event->getTranslation('description',$locale) : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
        <div class="col-md-4">
            @foreach (config("app.locales") as $locale)
            <x-back.card type='primary' title='Venue {{ $locale }} of the event'>
                <x-back.input name='venue_{{ $locale }}' :value="isset($event) ? $event->getTranslation('venue',$locale) : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <x-back.card type='primary' title='Date'>
                <input name='date' class="form-control" value="{{ old('date', isset($event) ? $event->date : '') }}" type='date'
                    required>
            </x-back.card>
            <x-back.card type='primary' title='Start Time'>
                <input name='start_time' class="form-control" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}" type='time'
                    required>
            </x-back.card>
            <x-back.card type='primary' title='End Time'>
                <input name='end_time' class="form-control" value="{{ old('end_time', isset($event) ? $event->end_time : '') }}" type='time'
                    required>
            </x-back.card>
            <x-back.card type='primary' title='Contact for details'>
                <input name='contact' class="form-control" value="{{ old('contact', isset($event) ? $event->contact : '') }}" type='text'
                    required>
            </x-back.card>
            <x-back.card type='primary' :outline="false" title='Image'>

                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($event)
                    <img style="width:100%;" src="{{ getImage($event) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button">Button</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($event) ? getImage($event) : '') }}" required>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId" value="{{ old('image', isset($event) && !empty($event->image) ? $event->image->id : '') }}" hidden>
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