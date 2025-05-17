@component('mail::message')
    # Welcome {{ $user->name }}

    Thanks for registering at our site!

    @component('mail::button', ['url' => url('/')])
        Visit Site
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
