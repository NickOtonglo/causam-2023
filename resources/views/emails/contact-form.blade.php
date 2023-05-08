@component('mail::message')
# Contact Form

Name: {{ $mail->sender_name }}
<br>
Email address: {{ $mail->sender_email }}
<br>
<b>Message</b>
<hr>
{{ $mail->message }}
<br><br>
*-This email is system-generated-*
{{ config('app.name') }}
@endcomponent
