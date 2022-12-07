<div>
    {{-- <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteTopic({{ $topic->id }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $topic->score }}</div>
        <div>
            <button wire:click="downvoteTopic({{ $topic->id }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            {{-- <a class="text-2xl text-black hover:text-blue-700" href="/post/{{ $topic_id }}">{{ $title }}</a> --}}

            <form class="my-4" wire:submit.prevent="showpost">
                <input type="submit" value="{{ $topic['title'] }}" class="text-2xl text-black hover:text-blue-700" />
            </form>

            {{-- <br><span class="">{{ $topic->body }}</span><br>
            <span class="text-gray-300">Posted by {{ $topic->author_id }} - [{{ $topic->status }}]</span>
        </div>
        <div><a href="/editpost/{{ $topic->id }}/{{ $topic->slug }}"><button title="Edit"><i
                        class="fa fa-pen fa-1x p-5 text-gray-300"></i></button></a>
        </div>
        <div><button wire:click="destroy({{ $topic->id }})" title="Delete"><i
                    class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
    </div> --}} 
</div>