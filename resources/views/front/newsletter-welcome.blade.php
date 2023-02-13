<div>
    <h1>@lang('AmisDeNzong Subscription Confirmation')</h1>

    <p>@lang('You have received this email because you are subscribed to the newsletter of AmisDeNzong')</p>
    <p>
        <span>@lang('Need help? Contact us, we will be happy to help you:')</span>
        <a href="mailto:contact@lesamisdenzong-fondationcandia.com">contact@lesamisdenzong-fondationcandia.com</span>
    </p>

    @lang('if you do not wish to receive any more emails, click on the following link to unsubscribe.')
    <a href="{{ url('newsletter.unsubscribe/'.$email) }}"> @lang('unsubscribe')</a>
</div>