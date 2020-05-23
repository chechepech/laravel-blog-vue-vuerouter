@component('mail::message')
# Access to {{config('app.name')}}

Credentials
@component('mail::table')
| Username | Password |
|:------------|:------------|
|{{$user->email}}|{{$password}}|
@endcomponent
@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
