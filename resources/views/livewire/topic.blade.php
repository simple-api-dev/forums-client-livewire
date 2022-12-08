<div>
    <div class="flex flex-row">
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
            <a class="text-blue-600" href="/comments/{{ $topic['id'] }}">{{ $topic['title'] }} </a>
            <br>
            {{ $topic['body'] }}
            <br>
            <span class="text-gray-300">Posted by {{ $topic['author_id'] }} - [{{ $topic['status'] }}]</span>
        </div>
    </div>
</div>
