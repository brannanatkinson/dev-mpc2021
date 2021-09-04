<div class="py-12 container mx-auto">
    <h1 class="text-3xl">2021 Giving Catalog</h1>
    @foreach ( App\Models\Category::orderBy('id')->get() as $category )
    <div class="max-w-7xl mx-auto flex flex-col">
        <div class="">
            <div class="text-center">
                <div class="text-sm uppercase">category</div>
                <div class="text-3xl">
                    {{ $category->name }}
                </div>
                
            </div>
        </div>
        <div class="">
            <div class="mt-8 grid grid-cols-4 gap-12 mb-4">
                 @foreach ( $category->items as $item )
                <div class="flex flex-col overflow-hidden rounded-md">
                    <div class="mb-4">
                         <a href="/catalog/item/{{ $item->id}}">
                            <img src="{{ Storage::url( $item->img ) }}" alt="">
                        </a>
                    </div>
                    <div class="h-6 text-center text-sm">
                        @if ( $item->sponsor_id )
                            <i class="fa fa-trophy pr-4"></i>Sponsor Match Doubles Your Gift
                        @endif 
                    </div>
                    <div class="mb-2 h-16 text-2xl ">
                        {{ $item->name }}
                    </div>
                    <div class="mb-4 flex-grow">
                        {{ $item->excerpt }}
                    </div>
                    <div class="mb-4 text-3xl">${{ $item->cost }}</div>
                    
                    <div class="justify-self-end mb-8">
                        <button class="px-4 py-4 text-white bg-mp-blue-green">Details</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- <div>{{ $category->description }}</div> -->
    </div>
    @endforeach
</div>
