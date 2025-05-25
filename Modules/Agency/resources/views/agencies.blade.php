<div>
    @forelse ($agencies as $agency)
        <li>{{ $agency->name }}</li>
    @empty
        <p>No agencies</p>
    @endforelse
</div>
