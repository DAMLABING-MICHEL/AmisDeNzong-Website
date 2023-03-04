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
                <form method="post" action="#" id="tag-form">
                    @csrf
                    @foreach (config("app.locales") as $locale )
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"> @lang('Title') {{ $locale }} @lang('of the
                            tag') </label>
                        <input type="text" class="form-control" name="tag_{{ $locale }}" id='tag-{{ $locale }}'>
                        <span id="tagError" style="color: red"></span>
                    </div>
                    @endforeach
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="create-tag"
                            id="btn-create-tag">@lang("submit")</button>
                        <input type="text" value="{{ route('tags.addTag') }}" id="tag-route" hidden>
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

            <x-back.card type='primary' title='Title'>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach(config('app.locales') as $locale)
                    <li class="nav-item">
                        <a class="nav-link {{ $locale == App::getLocale() ? 'active' :'' }}"
                            id="pills-{{ $locale }}-tab" data-toggle="pill" href="#pills-title-{{ $locale }}" role="tab"
                            aria-controls="pills-{{ $locale }}" aria-selected="false">{{ $locale }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach (config('app.locales') as $locale)
                    <div class="tab-pane fade {{ $locale == App::getLocale() ? 'show active' :'' }}"
                        id="pills-title-{{ $locale }}" role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">
                        <x-back.input name='title_{{ $locale }}'
                            :value="isset($post) ? $post->getTranslation('title',$locale) : ''" input='text'
                            :required="true">
                        </x-back.input>
                    </div>
                    @endforeach
                </div>
            </x-back.card>



            <x-back.card type='primary' title='Summary'>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach(config('app.locales') as $locale)
                    <li class="nav-item">
                        <a class="nav-link {{ $locale == App::getLocale() ? 'active' :'' }}"
                            id="pills-{{ $locale }}-tab" data-toggle="pill" href="#pills-summary-{{ $locale }}"
                            role="tab" aria-controls="pills-{{ $locale }}" aria-selected="false">{{ $locale }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach (config('app.locales') as $locale)
                    <div class="tab-pane fade {{ $locale == App::getLocale() ? 'show active' :'' }}"
                        id="pills-summary-{{ $locale }}" role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">
                        <x-back.input name='summary_{{ $locale }}'
                            :value="isset($post) ? $post->getTranslation('summary',$locale) : ''" input='textarea'
                            :required="true">
                        </x-back.input>
                    </div>
                    @endforeach
                </div>
            </x-back.card>

            <x-back.card type='primary' title='Content'>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach(config('app.locales') as $locale)
                    <li class="nav-item">
                        <a class="nav-link {{ $locale == App::getLocale() ? 'active' :'' }}"
                            id="pills-{{ $locale }}-tab" data-toggle="pill" href="#pills-content-{{ $locale }}"
                            role="tab" aria-controls="pills-{{ $locale }}" aria-selected="false">{{ $locale }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach (config('app.locales') as $locale)
                    <div class="tab-pane fade {{ $locale == App::getLocale() ? 'show active' :'' }}"
                        id="pills-content-{{ $locale }}" role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">
                        <x-back.input name='content_{{ $locale }}'
                            :value="isset($post) ? $post->getTranslation('content',$locale) : ''" input='textarea'
                            rows=10 :required="true">
                        </x-back.input>
                    </div>
                    @endforeach
                </div>
            </x-back.card>
            <button type="submit" class="btn btn-primary" id="submit">@lang('Submit')</button>

        </div>
        <div class="col-md-4">

            <x-back.card type='primary' :outline="false" title=''>
                <x-back.input name='active' title='Publication' :value="isset($post) ? $post->active : false"
                    input='checkbox' label="Active">
                </x-back.input>
                <x-back.input name='category' title='Category' input='select'
                    :value="isset($post) ? $post->category->id : collect()" :options="$categories">
                </x-back.input>
                <label for="tags">@lang('Tags')</label>
                <select multiple class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags[]"
                    id="tags">
                    @foreach($tags as $id => $title)
                    <option value="{{ $id }}" {{ old('tags') ? (in_array($id, old('tags')) ? 'selected' : '' ) :
                        ((isset($post) ? $post->tags : collect())->contains('id', $id) ? 'selected' : '') }}>
                        {{ $title }}
                    </option>
                    @endforeach
                </select>
                <input type="hidden" value="{{ App::getLocale() }}" id="locale">
                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModal">Add new
                    Tag</button>
                  <div class="mt-3">
                    <x-back.input name='slug' title='Slug' :value="isset($post) ? $post->slug : ''" input='text' :required="true">
                    </x-back.input>
                  </div>
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
                            class="btn btn-outline-secondary" type="button"><i class="fa fa-upload"></i>
                            @lang('Upload')</a>
                    </div>
                    <input id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="image" value="{{ old('image', isset($post) ? getImage($post, true) : '') }}" required
                        hidden>
                    <input id="image" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                        name="imageId"
                        value="{{ old('image', isset($post) && !empty($post->image) ? $post->image->id : '') }}" >
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
<script>
    (() => {

// Variables
const headers = {
    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
    'Content-Type': 'application/json',
    'Accept': 'application/json'
}
    var tag_en = document.getElementById('tag-en')
    var tag_fr = document.getElementById('tag-fr')
    var tag_it = document.getElementById('tag-it')
    var tagError = document.getElementById('tagError')
    var tagList = document.getElementById('tags')
    var locale = document.getElementById('locale')
    const tagRoute = document.getElementById('tag-route')

// Delete 
    const createTag = async e => {              
        e.preventDefault();
        const datas = {
            tag_en: tag_en.value,
    		  tag_fr: tag_fr.value,
    		  tag_it: tag_it.value,
            };
            const response = await fetch(`${tagRoute.value}`, { 
                method: 'POST',
                headers: headers,
                body: JSON.stringify(datas)
             })
                      // Wait for response
            const data = await response.json();
            const errorAlert = () => Swal.fire({
            icon: 'error',
            title: 'Whoops!',
            text: 'Something went wrong'
        });
            // Manage response
            var newTag = null
            if (response.ok) {
                tag_ref = JSON.parse(data)
                if (tag_ref.message != null) {
                    window.alert(tag_ref.message)
                }else{
                    tagList.innerHTML = '<option value="'+tag_ref.id +'">'+tag_ref.title[locale.value] +'</option>' + tagList.innerHTML
                    $('.alert').show('slow');
                }
            } else {
                if (response.status == 422) {
                    $.each(data.errors, function (i, error) {
                        $('form')
                            .find('[name="' + i + '"]')
                            .addClass('input-invalid')
                            .next()
                            .append(error[0]);
                    });
                } else {
                    errorAlert();
                }
            }
    }
// Listener wrapper
const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
    const element = document.querySelector(selector);
    if(element) {
        document.querySelector(selector).addEventListener(type, e => { 
            if(eval(condition)) {
                callback(e);
            }
        }, capture);
    }
};

// Set listeners
window.addEventListener('DOMContentLoaded', () => {
    wrapper('#tag-form', 'click', createTag);
});

})()
</script>
@include('back.shared.editorScript')
@endsection