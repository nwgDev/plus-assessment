@component('mail::message')
    Dear User,

    We hope this email finds you well. We are writing to inform you about a recent security event associated with your account. Our systems have detected a login from a new browser or location, and we take the security of your account very seriously.

    We understand the importance of safeguarding your account, and we appreciate your immediate attention to this matter. Thank you for your cooperation.

    Sincerely,
    {{ config('app.name') }}
@endcomponent

