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
<div class="modal fade" id="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Add new Tag')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-info" style="display: none">
                <span>The tag has been successfuly created</span>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('tags.store') }}" onsubmit="return sendData();" id="tag-form">
                    @csrf
                    @foreach (config('app.locales') as $locale )
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title_{{ $locale }}</label>
                        <input type="text" class="form-control" name="tag_{{ $locale }}" id='tag-{{ $locale }}'>
                        <span id="tagError" style="color: red"></span>
                    </div>
                    @endforeach
                    <div class="modal-footer">
                        <button type="submit" name="create-tag">submit</button>
                        <input type="text" value="{{ route('tags.store') }}" id="tag-route" hidden>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form method="post"
    action="{{ Route::currentRouteName() === 'posts.edit' ? route('posts.update', $post->id) : route('posts.store') }}">

    @if(Route::currentRouteName() === 'posts.edit')
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

            @foreach ( config('app.locales') as $locale )
            <x-back.card type='primary' title='Title_{{ $locale }}'>
                <x-back.input name='title_{{ $locale }}' :value="isset($post) ? $post->title : ''" input='text'
                    :required="true">
                </x-back.input>
            </x-back.card>

            <x-back.card type='primary' title='Summary_{{ $locale }}'>
                <x-back.input name='summary_{{ $locale }}' :value="isset($post) ? $post->summary : ''" input='textarea'
                    :required="true">
                </x-back.input>
            </x-back.card>

            <x-back.card type='primary' title='Content_{{ $locale }}'>
                <x-back.input name='content_{{ $locale }}' :value="isset($post) ? $post->content : ''" input='textarea'
                    rows=10 :required="true">
                </x-back.input>
            </x-back.card>
            @endforeach
            <button type="submit" class="btn btn-primary">@lang('Submit')</button>

        </div>
        <div class="col-md-4">

            <x-back.card type='primary' :outline="false" title='Publication'>
                <x-back.input name='active' :value="isset($post) ? $post->active : false" input='checkbox'
                    label="Active">
                </x-back.input>
            </x-back.card>

            <x-back.card type='warning' :outline="false" title='Category' :required="true">
                <x-back.input name='category' input='select' :value="isset($post) ? $post->category->id : collect()"
                    :options="$categories">
                </x-back.input>
            </x-back.card>
            <x-back.card type='danger' :outline="false" title='Tags'>
                <x-back.input name='tags' :values="isset($post) ? $post->tags : collect()" input='selectMultiple'
                    :options="$tags">
                </x-back.input>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new
                    Tag</button>
            </x-back.card>
            <x-back.card type='success' :outline="false" title='Slug'>
                <x-back.input name='slug' :value="isset($post) ? $post->slug : ''" input='text' :required="true">
                </x-back.input>
            </x-back.card>

            <x-back.card type='primary' :outline="false" title='Image'>

                <div id="holder" class="text-center" style="margin-bottom:15px;">
                    @isset($post)
                    <img style="width:100%;" src="{{ getImage($post, true) }}" alt="">
                    @endisset
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white"
                            class="btn btn-outline-secondary" type="button">Button</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($post) ? getImage($post, true) : '') }}" required>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId" value="{{ old('image', isset($post) ? getImageId($post, true) : '') }}" hidden>
                    @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                    @endif
                </div>


            </x-back.card>

            <x-back.card type='info' :outline="false" title='SEO'>
                <x-back.input title='META Description' name='meta_description'
                    :value="isset($post) ? $post->meta_description : ''" input='textarea' :required="true">
                </x-back.input>
                <x-back.input title='META Keywords' name='meta_keywords'
                    :value="isset($post) ? $post->meta_keywords : ''" input='textarea' :required="true">
                </x-back.input>
                <x-back.input title='SEO Title' name='seo_title' :value="isset($post) ? $post->seo_title : ''"
                    input='text' :required="true">
                </x-back.input>
            </x-back.card>
        </div>

    </div>


</form>
@endsection

@section('js')

@include('back.shared.editorScript')
@endsection