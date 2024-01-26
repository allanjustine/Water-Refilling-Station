<!-- resources/views/subscribe.blade.php -->

<form method="POST" action="{{ route('subscribe') }}">
    @csrf

    <button type="submit">Subscribe</button>
</form>
