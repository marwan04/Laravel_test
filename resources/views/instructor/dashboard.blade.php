<h1>Welcome, Instructor!</h1>
<a href="{{ route('instructor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('instructor.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
