<div>
    <div>
        <div>Forum:Topics</div>
    </div>
    <div class="flex flex-row">
        <div>
            <input type="text" class="rounded border-spacing-2" placeholder="Topic title" wire:model="form.title" />
            @error('form.title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" wire:click="addTopic">Add Topic</button>
        </div>
    </div>
    
    @foreach ($topics as $topic)
        <div class="ml-5"><a href="/topic/{{ $topic['slug'] }}">{{ $topic['title'] }}</a></div>
    @endforeach
</div>
