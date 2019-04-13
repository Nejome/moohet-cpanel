@component('mail::message')
# Password Reset

Welcome , to create new password please press the button below , Then enter your new password.

@component('mail::button', ['url' => $link])
Create Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
