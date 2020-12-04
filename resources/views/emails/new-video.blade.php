@component('mail::message')
# Hello, {{ $recipient }}!

<span style="font-weight: 500; font-size: 14px">New video has been uploaded in {{ $classroom->name . ' ' . $classroom->grade . ' ' .  $classroom->major }}.</span>

@component('mail::button', ['url' => 'http://127.0.0.1:8080/classrooms', 'color' => 'red'])
Go open!
@endcomponent

Thanks,<br>
<span style="font-weight: bold">{{ config('app.name') }}</span>
@endcomponent