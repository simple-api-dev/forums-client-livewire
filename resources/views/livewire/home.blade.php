<div>
    <div class='p-5'>
        <span class="text-black font-bold">Forum:home</span>
        @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="flex flex-row">
        <div class="bg-slate flex-grow p-2">
            <a href="/createpost">
                <div class="w-full border-2 border-black-100 bg-slate-100  hover:border-2 hover:border-blue-900">
                    Add Topic</div>
            </a>
        </div>
    </div>

    <div class="h-2 bg-slate-300"></div>

    @foreach ($topics as $topic)
        @livewire('topic', ['slug' => $topic->slug])
    @endforeach
</div>
