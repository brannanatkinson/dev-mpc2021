<div>
    <div class="my-12 text-3xl text-center">
        {{ $user->name }}
    </div>
    <div class="max-w-4xl mx-auto">
        <div class="mt-6 mb-12">
            <div class="mb-6 text-center uppercase">
                Amount Raised
            </div>
            <div class="text-6xl font-bold text-center">
                ${{ App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') }}
            </div>
        </div>
        <div class="text-center">
            <button href="{{ route('catalog') }}" class="px-4 py-3 text-2xl text-white bg-green-500">Shop the Giving Catalog</button>
        </div>
        <div class="my-6 p-8 bg-white rounded-md">
            <div class="mb-8 text-3xl text-center">Why I'm supporting Housing Hope</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed convallis tristique sem.  Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. 
            </p>
        </div>
        

    </div>
</div>
