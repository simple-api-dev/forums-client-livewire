<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteTopic({{ $topic['id'] }})" title="Upvote"><i
                    class="fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10" wire:model="$topic['score']">
        </div>
        <div>
            <button wire:click="downvoteTopic({{ $topic['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            {{-- <a class="text-2xl text-black hover:text-blue-700" href="/post/{{ $topic_id }}">{{ $title }}</a> --}}

            <div class="my-4" wire:submit.prevent="showpost">
                <a href="{{ $url }}/{{ $topic['id'] }}/comments">


                    <input type="submit" value="{{ $topic['title'] }}"
                        class="text-2xl text-black hover:text-blue-700" />
            </div>

            <br><span class="">{{ $topic['body'] }}</span><br>
            <span class="text-gray-300">Posted by {{ $topic['author_id'] }} - [{{ $topic['status'] }}]</span>
        </div>
    </div>
