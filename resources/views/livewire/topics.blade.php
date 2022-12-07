<div>
    <span class="text-black font-bold">Forum:Topics</span>
    @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
    @endif

    <div class="m-10">
        <form class="my-4" wire:submit.prevent="addTopic">
            <input type="submit" value="Add Topic" class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" />
        </form>
    </div>

    @foreach ($topics as $topic)
        {{-- @livewire("topic", ['topic' => $topic, 'key' => Str::random(6)]) --}}
        <livewire:topic  :topic="$topic" :wire:key="$loop->index"/>
    @endforeach
</div>
