@component('mail::message')
# Welcome to Laragram

We love that you joined us.


@component('mail::button', ['url' => "laragram.com" ])
View your Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
