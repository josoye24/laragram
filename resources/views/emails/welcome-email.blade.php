@component('mail::message')
# Welcome to Joseph Laravel clone

This is a forum community for developers, we love that you joined us.


@component('mail::button', ['url' => "http://127.0.0.1:8000" ])
View your Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
