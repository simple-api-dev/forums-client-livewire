<div class="ml-2 bg-slate-100 py-1 px-1">
    <div class="flex flex-row">
        <div class="w-10">
            <button wire:click="upvoteComment({{ $comment['id'] }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="w-10">
            {{ $comment['score'] }}
        </div>
        <div class="w-10">
            <button wire:click="downvoteComment({{ $comment['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="flex-grow">
            {{ $comment['body'] }}
            <br>
            <span class="text-gray-300">Posted by {{ $comment['author_id'] }} - [{{ $comment['status'] }}]</span>
        </div>
        <div class="flex flex-row m-5 border-2">
            <input type="text" class="rounded border-spacing-2" placeholder="Add Comment" wire:model="form.body" />
             @error('form.body')
                 <span class="text-red-500 text-xs">{{ $message }}</span>
             @enderror
             <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer"
                 wire:click="addComment({{ $comment['id'] }})">Reply</button>
         </div>
    </div>

    
    
    <div class="ml-2 py-1 px-1">
        @foreach ($comment["comments"] as $comment)
            <livewire:comment :topic_id="$topic_id" :comment="$comment" :wire:key="$comment['id'] . rand()"/>
        @endforeach
    </div>
</div>




