@component('mail::message')
# Email Verification

Welcome to moohet website for E-Commerce . We wish you all success.
To complete your registration and verify your email, Please click the below button .

@component('mail::button', ['url' => $link])
Verify my Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
