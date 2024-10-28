<div>
    <p>{{ $user }}</p>

    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" style="text-decoration: none; all: unset">
            <a href="">
                <span class="nav-item">Logout</span>
            </a>
        </button>
    </form>

    <a href="{{ route('dashboard.index') }}">dashboard</a>
</div>
