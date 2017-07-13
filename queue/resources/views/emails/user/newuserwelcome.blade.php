@component('mail::message')
# welcomr to tuantran app

thank for signup ,**we really appricate** it

@component('mail::button', ['url' => 'http://tuan.dev/home'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
