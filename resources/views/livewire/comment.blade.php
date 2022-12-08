<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteComment({{ $comment['id'] }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $comment['score'] }}</div>
        <div>
            <button wire:click="downvoteComment({{ $comment['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>


        <div class="text-slate-400 flex-grow">
            @if ($comment['commentable_type'] == 'App\\Models\\Comment')
                <br><span class="ml-10">{{ $comment['body'] }}</span><br>
                <span class="text-gray-300 ml-10">Posted by {{ $comment['author_id'] }}</span>
            @else
                <br><span class="">{{ $comment['body'] }}</span><br>
                <span class="text-gray-300">Posted by {{ $comment['author_id'] }}</span>
            @endif
        </div>
        <div><button wire:click="destroyComment({{ $comment['id'] }})" title="Delete"><i
                    class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><button type="button" wire:click="$toggle('showDiv')"><i
                    class="fa fa-comment fa-1x p-5 text-gray-300"></i></button>
        </div>
    </div>


    @if ($showDiv)
        <div class="flex flex-row">
            <div>
                <input type="text" class="rounded border-spacing-2" placeholder="Add Comment"
                    wire:model="form.body" />
                @error('form.body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer"
                    wire:click="addComment({{ $comment['id'] }})">Reply</button>
            </div>
        </div>
    @endif

    @include('livewire.commentsRecursive', ['topic_id' => $topic_id, 'comment_id' => $comment['id'], 'comments' => $comment['comments'], ]) 

</div>
