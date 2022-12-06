<div>
    <div class='p-5'>
        <span class="text-3xl text-black font-bold">stgr</span>
        @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="flex flex-row">
        <div>
            <i class="fa fa-cubes fa-2x text-gray-300 mt-3"></i>
        </div>
        <div class="bg-slate flex-grow p-2">
            <a href="/createpost">
                <div class="w-full border-2 border-black-100 bg-slate-100  hover:border-2 hover:border-blue-900">
                    Create Post</div>
            </a>
        </div>
        <div>
            <i class="fa fa-picture-o fa-1x text-gray-300"></i>
            <i class="fa fa-link fa-1x text-gray-300"></i>
        </div>
    </div>

    <div class="h-5 bg-slate-300"></div>


    @foreach ($topics as $topic)
        @livewire('show-topic', ['slug' => $topic->slug])
    @endforeach
</div>
