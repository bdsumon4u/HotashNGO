@component('mail::message')
# {{ $data['subject'] }}

{!! nl2br($data['message']) !!}

From,<br>
Name: {{ $data['name'] }}<br>
Phone: <a href="tel:{{ $data['phone_number'] }}">{{ $data['phone_number'] }}</a><br>
Email: <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a><br>
@endcomponent
