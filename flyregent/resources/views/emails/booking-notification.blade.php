@component('mail::message')
Hi, {{$toWhom}}

@component('mail::panel')
{{$text}}
@endcomponent

@if($link)
@component('mail::button', ['url' => $link, 'color' => 'blue'])
    {{$buttonText}}
@endcomponent

If, button doesn't work then copy this below link and paste in you browser.
{{$link}}
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent