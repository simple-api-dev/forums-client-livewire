<div>
    <div>
        <div>Forum:Topics</div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success bg-green-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-row">
        <div>
            <input type="text" class="rounded border-spacing-2 border-2" placeholder="Title" wire:model="form.title" />
            @error('form.title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <input type="text" class="rounded border-spacing-2 border-2" placeholder="Body" wire:model="form.body" />
            @error('form.body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <select wire:model="form.status">
                <option value="Active" selected>Active</option>
                <option value="Draft">Draft</option>
                <option value="Pending Review">Pending Review</option>
                <option value="Locked">Locked</option>
                <option value="Removed">Removed</option>
            </select>
            <select wire:model="form.type">
                    <option value="Post" selected>Post</option>
                    <option value="Video">Video</option>
                    <option value="Article">Article</option>
                    <option value="Image">Image</option>
            </select>
            <input type="text" class="rounded border-spacing-2 border-2" placeholder="Url" wire:model="form.url" />
            @error('form.url')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" wire:click="addTopic">Add
                Topic</button>
        </div>
    </div>

    @foreach ($topics as $topic)
        <div class="ml-5"><a href="/topic/{{ $topic['slug'] }}">{{ $topic['title'] }}</a></div>
    @endforeach
</div>
