@extends('back.layout')

@section('content')

<form method="post"
    action="{{ Route::currentRouteName() === 'categories.edit' ? route('categories.update', $category->id) : route('categories.store') }}">

    @if(Route::currentRouteName() === 'categories.edit')
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
                <x-back.input title='Title {{ $locale }} of the category' name='title_{{ $locale }}'
                    :value="isset($category) ? $category->title : ''" input='text' :required="true">
                </x-back.input>
                @endforeach
                <x-back.input title='Slug' name='slug' :value="isset($category) ? $category->slug : ''" input='text'
                    :required="true">
                </x-back.input>
                <x-back.input title='Description(Optional)' name='description'
                    :value="isset($category) ? $category->description : ''" input='textarea' :required="false">
                </x-back.input>
            </x-back.card>

            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

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
            $('form').submit(function (event) {
                if ($(this).hasClass('submitted')) {
                    event.preventDefault();
                }
                else {
                    $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
                    $(this).addClass('submitted');
                    document.getElementById("submit").disabled = true;
                }
            });
        });

</script>

@endsection