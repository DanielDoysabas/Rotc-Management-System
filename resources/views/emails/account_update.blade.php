{{-- blade-formatter-disable --}}
@component('mail::message')

Hi {{ $user->name }},

Good Day!

@if($user->is_activated == 0)
Unfortunatetly there are circumstances that you did not totally comply and the administrator choses to deactivate your account.
@endif

@if($user->is_activated == 1)
Your account is now activated. You can now use our platform just click the button below to redirect.
@endif

@component('mail::button', ['url' => $url])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
