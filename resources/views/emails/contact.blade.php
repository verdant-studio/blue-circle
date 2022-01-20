{{ __('contact.email.intro', ['name' => config('app.name')]) }}

<p>{{ __('general.name') }}: {{ $name }}</p>
<p>{{ __('contact.email._singular') }}: {{ $email }}</p>
<p>{{ __('contact.email.message') }}:{{ $messageContent }}</p>

