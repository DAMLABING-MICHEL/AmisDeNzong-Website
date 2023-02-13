@extends('back.layout')

@section('content')

    <form 
        method="post" 
        action="{{ Route::currentRouteName() === 'tags.edit' ? route('tags.update', $tag->id) : route('tags.store') }}">

        @if(Route::currentRouteName() === 'tags.edit')
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
                    title='Title {{ $locale }} of the tag'
                    name='tag_{{ $locale }}'
                    :value="isset($tag) ? $tag->getTranslation('title',$locale) : ''"
                    input='text'
                    :required="true">
                </x-back.input>
                    @endforeach
                    <x-back.input
                        title='Slug'
                        name='slug'
                        :value="isset($tag) ? $tag->slug : ''"
                        input='text'
                        :required="true">
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

            $('#tag_en').keyup(function () {
              $('#slug').val(getSlug($(this).val()))
            })
        });

    </script>

@endsection