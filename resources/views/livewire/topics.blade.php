<div>
    <div>Forum:Topics</div>
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-300">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-row">
        <div>
            <input type="text" class="rounded border-spacing-2" placeholder="Topic Title" wire:model="form.title" />
            @error('form.title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" wire:click="addTopic">Add Topic</button>
        </div>
    </div>

    @foreach ($topics as $topic)
        <livewire:topic :topic="$topic" :wire:key="$loop->index . rand()" />
    @endforeach
</div>
