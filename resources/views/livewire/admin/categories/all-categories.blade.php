<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="text-3xl">
            Giving Catalog Categories
        </div>
        <div class="grid grid-cols-6 gap-8">
            @foreach ( $categories as $category )
                <div class="col-span-4"><span clsss="text-2xl">{{ $category->name }}</span> </div>
                <div><a wire:click.prevent="edit({{ $category->id }})">Edit</a></div>
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new category</div>
    @if ( $createMode == true )
    @include('livewire.admin.categories.new-category')
    @endif
    @if ( $updateMode == true )
    @include('livewire.admin.categories.update-category')
    @endif
</div>