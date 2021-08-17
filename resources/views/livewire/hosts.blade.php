<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        @foreach ( $host->items as $item )
        {{ $item->name }} : {{ $item->sum('pivot.quantity_ordered') }}
        @endforeach
    </div>
    @endforeach
</div>
