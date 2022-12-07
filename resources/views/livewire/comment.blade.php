<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteComment({{ $comment_id }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $score }}</div>
        <div>
            <button wire:click="downvoteComment({{ $comment_id }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            @if ($commentable_type == 'App\\Models\\Comment')
                <br><span class="ml-10">{{ $body }}</span><br>
                <span class="text-gray-300 ml-10">Posted by {{ $author_id }}</span>
            @else
                <br><span class="">{{ $body }}</span><br>
                <span class="text-gray-300">Posted by {{ $author_id }}</span>
            @endif
        </div>
        <div><button wire:click="destroyComment({{ $comment_id }})" title="Delete"><i
                    class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><button type="button" wire:click="$toggle('showDiv')"><i
                    class="fa fa-comment fa-1x p-5 text-gray-300"></i></button>
        </div>
    </div>


    @if ($showDiv)
        <form class="my-4" wire:submit.prevent="submit">
            <div class="flex flex-row">
                <div class="bg-slate flex-grow p-2">
                    <div class="flex justify-around my-8">
                        <div class="flex flex-wrap w-10/12">
                            <input type="hidden" wire:model="form.comment_id" />
                            <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Add Comment"
                                wire:model="form.commentoncomment" />
                            @error('form.commentoncomment')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Reply"
                            class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" />
                    </div>
                </div>
            </div>
        </form>
    @endif

    @include('livewire.commentsRecursive', [
        'topic_id' => $topic_id,
        'comment_id' => $comment_id,
        'comments' => $comments,
    ])
</div>
