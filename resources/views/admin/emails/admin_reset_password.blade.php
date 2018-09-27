@component('mail::message')
# Reset Account
Welcome {{$data['data']->name}}

You telled us that you forgot your password,If not please Ignore this message

@component('mail::button', ['url' => admin_url('reset/password/'.$data['token'])])
Click here to reset
@endcomponent
or<br>
Copy this link
<a href="{{admin_url('reset/password/'.$data['token'])}}">{{admin_url('reset/password/'.$data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
