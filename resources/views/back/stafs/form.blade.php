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

            <x-back.card type='primary' title=''>
                <x-back.input title='Last Name' name='lastName' :value="isset($staff) ? $staff->lastName : ''" input='text'
                    :required="true">
                </x-back.input>
                <x-back.input title='First Name' name='firstName' :value="isset($staff) ? $staff->firstName : ''" input='text'
                    :required="true">
                </x-back.input>
                <x-back.input title='Gender' name='gender' :value="isset($staff) ? $staff->gender : ''" input='select' :options="['Male','Female']"
                    :required="true">
                </x-back.input>
                <x-back.input title='Phone' name='phone' :value="isset($staff) ? $staff->phone : ''" input='text'
                    :required="true">
                </x-back.input>
                <x-back.input title='Email' name='email' :value="isset($staff) ? $staff->email : ''" input='text'
                    :required="false">
                </x-back.input>
                @foreach (config('app.locales') as $locale)
                    <x-back.input title='Description {{ $locale }} of the staff' name='description_{{ $locale }}' :value="isset($staff) ? $staff->getTranslation('description',$locale) : ''" input='textarea'
                        :required="true">
                    </x-back.input>
                @endforeach
            </x-back.card>
            
            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

        </div>
        <div class="col-md-4">
            <x-back.card type='primary' title=''>
                @foreach (config("app.locales") as $locale)
                <x-back.input title='position {{ $locale }} of the staff' name='position_{{ $locale }}' :value="isset($staff) ? $staff->getTranslation('position',$locale) : ''" input='text'
                    :required="false">
                </x-back.input>
                @endforeach
                <x-back.input title='Occupation' name='feature' :value="isset($staff) ? $staff->feature->title : ''" input='select' :options="$features"
                    :required="true">
                </x-back.input>
                {{-- <x-back.input title='Grade' name='grade' :value="isset($staff) ? $staff->grade->title : ''" input='select' :options="$grades"
                    :required="true">
                </x-back.input> --}}
                {{-- <x-back.card type='' :outline="false" title='Social links'>
                    <select multiple
                    class="form-control{{ $errors->has('follows') ? ' is-invalid' : '' }}" name="follows[]"
                    id="follows">
                    @foreach($follows as $id => $title)
                    <option value="{{ $id }}" {{ old('follows') ? (in_array($id, old('follows')) ? 'selected' : '' ) :
                        ((isset($staff) ? $staff->follows : collect())->contains('id', $id) ? 'selected' : '') }}>
                        {{ $title }}
                    </option>
                    @endforeach
                </select>
                </x-back.card> --}}
            <x-back.card type='' :outline="false" title='Image'>
                <div id="holder" title='Image' class="text-center" style="margin-bottom:15px;">
                    @isset($staff)
                    <img style="width:100%;" src="{{ getImage($staff, true) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button"><i class="fa fa-upload"></i>  @lang('Upload')</a>
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
            </x-back.card>
        </div>

    </div>


</form>
@endsection

@section('js')

@include('back.shared.editorScript')
@endsection