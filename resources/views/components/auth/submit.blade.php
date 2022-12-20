@props(['title'])
<div class="form-group mt-5">
    <button type="submit" class="submit-button p-1 disabled" value="@lang($title)" id="btn-submit">{{$title}}</button>
</div>