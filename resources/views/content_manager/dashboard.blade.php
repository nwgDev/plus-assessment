<h1>Content Manager Dashboard</h1>

<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
</form>

