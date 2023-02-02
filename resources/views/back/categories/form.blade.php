@extends('back.layout')

@section('content')

    <form 
        method="post" 
        action="{{ Route::currentRouteName() === 'categories.edit' ? route('categories.update', $category->id) : route('categories.store') }}">

        @if(Route::currentRouteName() === 'categories.edit')
            @method('PUT')
        @endif
        
        @csrf

        <div class="row">
          <div class="col-md-12">
                
                <x-back.validation-errors :errors="$errors" />

                @if(session('ok'))
                    <x-back.alert 
                        type='success'
                        title="{!! session('ok') !!}">
                    </x-back.alert>
                @endif

                <x-back.card
                    type='info'
                    :outline="true"
                    title=''>
                    @foreach (config('app.locales') as $locale )
                    <x-back.input
                    title='Title_{{ $locale }}'
                    name='title_{{ $locale }}'
                    :value="isset($category) ? $category->title : ''"
                    input='text'
                    :required="true">
                </x-back.input>
                    @endforeach
                    <x-back.input
                        title='Slug'
                        name='slug'
                        :value="isset($category) ? $category->slug : ''"
                        input='text'
                        :required="true">
                    </x-back.input>
                    <x-back.input
                        title='Description'
                        name='description'
                        :value="isset($category) ? $category->description : ''"
                        input='text'
                        :required="false">
                    </x-back.input>
                </x-back.card>

                <button type="submit" class="btn btn-primary">@lang('Submit')</button>

              </div>
        </div>


    </form>

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script>

        $(function() 
        {
            $('#slug').keyup(function () {
              $(this).val(getSlug($(this).val()))
            })

            $('#title_en').keyup(function () {
              $('#slug').val(getSlug($(this).val()))
            })
        });

    </script>

@endsection