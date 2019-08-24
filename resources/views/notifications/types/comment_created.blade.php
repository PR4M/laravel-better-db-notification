@component('notifications/notification')
    {{ $notification->data->author->name }} ({{ $notification->data->author->id }}) posted a comment,
    <a href="{{ $notification->data }}">Here</a>
@endcomponent
