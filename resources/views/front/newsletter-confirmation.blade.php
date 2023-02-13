<div id="confirm-subscribe">
    <h1>@lang('Please Confirm Subscription')</h1>

    @lang('Please confirm your subscription to our newsletter with bellow link:')
        <a href="{{ url('newsletter.confirm/'.$email) }}"> @lang('confirm')</a>
</div>