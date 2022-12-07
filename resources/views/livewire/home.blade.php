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
            <form class="my-4" wire:submit.prevent="createpost">
                <input type="submit" value="Add Topic" class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" />
            </form>
        </div>
    </div>

    <div class="h-2 bg-slate-300"></div>

    @foreach ($topics as $topic)
        @livewire('topic', ['slug' => $topic->slug])
    @endforeach
</div>
