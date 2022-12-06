<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteComment({{ $comment_id }})" title="Upvote"><i
                    class="p-2 fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $score }}</div>
        <div>
            <button wire:click="downvoteComment({{ $comment_id }})" title="Downvote"><i
                    class="p-2 fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            <br><span class="">{{ $body }}</span><br>
            <span class="text-gray-300">Posted by {{ $author_id }}</span>
        </div>
        <div><button wire:click="destroyComment({{ $comment_id }})" title="Delete"><i
                    class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><button wire:click="reportComment({{ $comment_id }})" title="Report"><i
                    class="fa fa-flag fa-1x p-5 text-gray-300"></i></button>
        </div>
    </div>


    <form class="my-4" wire:submit.prevent="submit">
        <div class="flex flex-row">
            <div class="bg-slate flex-grow p-2">
                <div class="flex justify-around my-8">
                    <div class="flex flex-wrap w-10/12">
                        <input type="text" class="p-2 rounded border shadow-sm" wire:model="form.comment_id" />
                        <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Add Comment"
                            wire:model="form.commentoncomment" />
                        @error('form.commentoncomment')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" />
                </div>
            </div>
        </div>
    </form>
</div>
