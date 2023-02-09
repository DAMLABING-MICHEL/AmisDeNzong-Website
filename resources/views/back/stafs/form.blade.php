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
    action="{{ Route::currentRouteName() === 'staff.edit' ? route('staff.update', $staff->id) : route('staff.store') }}">

    @if(Route::currentRouteName() === 'staff.edit')
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

            <x-back.card type='primary' title='Last Name'>
                <x-back.input name='lastName' :value="isset($staff) ? $staff->lastName : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='First Name'>
                <x-back.input name='firstName' :value="isset($staff) ? $staff->firstName : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Gender'>
                <x-back.input name='gender' :value="isset($staff) ? $staff->gender : ''" input='select' :options="['Male','Female']"
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Phone'>
                <x-back.input name='phone' :value="isset($staff) ? $staff->phone : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Email'>
                <x-back.input name='email' :value="isset($staff) ? $staff->email : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>

            @foreach (config('app.locales') as $locale)
            <x-back.card type='primary' title='Description_{{ $locale }}'>
                <x-back.input name='description_{{ $locale }}' :value="isset($staff) ? $staff->getTranslation('description',$locale) : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            
            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
        <div class="col-md-4">
            @foreach (config("app.locales") as $locale)
            <x-back.card type='primary' title='Position_{{ $locale }}'>
                <x-back.input name='position_{{ $locale }}' :value="isset($staff) ? $staff->getTranslation('position',$locale) : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <x-back.card type='primary' title='Feature'>
                <x-back.input name='feature' :value="isset($staff) ? $staff->feature->title : ''" input='select' :options="$features"
                    :required="true">
                </x-back.input>
            </x-back.card>
            <x-back.card type='primary' title='Grade'>
                <x-back.input name='grade' :value="isset($staff) ? $staff->grade->title : ''" input='select' :options="$grades"
                    :required="true">
                </x-back.input>
            </x-back.card>
            
            <x-back.card type='primary' :outline="false" title='Image'>

                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($staff)
                    <img style="width:100%;" src="{{ getImage($staff, true) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button">Button</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($staff) ? getImage($staff, true) : '') }}" required>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId" value="{{ old('image', isset($staff) && !empty($staff->image) ? $staff->image->id : '') }}" hidden>
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