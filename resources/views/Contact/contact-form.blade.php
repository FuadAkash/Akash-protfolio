@component('mail::message')

<h3>New message from {{$contact['email']}}</h3>

<p>Name: {{$contact['name']}}</p>

<p>Phone: {{$contact['phone']}}</p>

<p>Message: {{$contact['message']}}</p>

@endcomponent
