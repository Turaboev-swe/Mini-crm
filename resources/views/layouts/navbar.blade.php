<div class="d-flex justify-content-center gap-3 p-3 bg-gradient-to-r from-purple-500 to-blue-500">
    <a href="{{ route('dashboard') }}" class="btn btn">Dashboard</a>
    <a href="{{ route('leads.index') }}" class="btn btn">Leads</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn">Exit</button>
    </form>
</div>
