@component('mail::message')
# Instructies

Beste,

{{$user->name}}
<br>
<br>

Dit is een activatie mail klik op knop of kopieer de link en plak hem in een browser naar keuzen.

{{route('staff.user.confirm', $confirmation_code)}}
<br>
<br>

Gebruik dit wachtwoord om in te loggen.

Password: {{$password}}

@component('mail::button', ['url' => route('staff.user.confirm', $confirmation_code)])
Verify your account
@endcomponent

Welcome to the team!<br>
{{--{{ config('app.name') }}--}}
@endcomponent
