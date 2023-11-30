{{-- blade-formatter-disable --}}
@component('mail::message')
Dear<strong> {{ $user->student->full_name ?? $user->name }}</strong>,

Welcome to {{ config('app.name') }}! Your account is now active, and you can start exploring our platform.

Here are your account credentials:
@component('mail::panel')
{{-- Email: {{ $user->email }} <br> --}}
Email: {{ $user->email }} <br>
Password: {{ $password }} <br>
Registered as: {{ucfirst($user->role->name)}}
@endcomponent

Please remember that this password is auto-generated. To ensure the security of your account, we recommend updating your password after logging in.

Thank you for joining us!

Best regards,
{{ config('app.name') }}
@endcomponent
