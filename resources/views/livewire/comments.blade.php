<div>
    <div>Forum:Comments</div>
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-300">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-row">
        <div>
            <input type="text" class="rounded border-spacing-2" placeholder="Comment Body" wire:model="form.body" />
            @error('form.body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" wire:click="addTopicComment">Add Topic
                Comment</button>
        </div>
    </div>

    @foreach ($comments as $comment)
        <livewire:comment :topic_id="$this->topic_id" :comment="$comment" :wire:key="$loop->index . rand()" />
    @endforeach
</div>
