<div>
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-row m-5 border-2">
        <input type="text" class="rounded border-spacing-2" placeholder="Add Comment" wire:model="form.body" />
        @error('form.body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer"
            wire:click="addComment({{ $topic['id'] }})">Comment</button>
    </div>


    <div class="flex flex-row bg-green-100 py-1 px-1">
        <div class="w-10">
            <button wire:click="upvoteTopic({{ $topic['id'] }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="w-10">
            {{ $topic['score'] }}
        </div>
        <div class="w-10">
            <button wire:click="downvoteTopic({{ $topic['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="flex-grow">
            <a class="text-blue-600" href="/topic/{{ $topic['slug'] }}">{{ $topic['title'] }} </a>
            <br>
            {{ $topic['body'] }}
            <br>
            <span class="text-gray-300">Posted by {{ $topic['author_id'] }} - [{{ $topic['status'] }}]</span>
        </div>
    </div>

    @foreach ($topic['comments'] as $comment)
        <livewire:comment :topic_id="$topic['id']" :comment="$comment" :wire:key="$comment['id'] . rand()" />
    @endforeach
</div>
