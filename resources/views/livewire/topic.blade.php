<div>
    <div class="flex bg-slate-200 p-5">
        <div class="mt-2 bg-white">
            <div class="fa w-10 p-2" wire:click="upvoteTopic({{ $topic['id'] }})" title="Upvote"><i
                    class="fa-arrow-up text-gray-400 hover:text-green-700"></i></div>
            <div class="w-10 p-2 text-xs font-bold text-black">{{ $topic['score'] }}</div>
            <div class="w-10 p-2" wire:click="downvoteTopic({{ $topic['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down text-gray-400 hover:text-red-700"></i></div>
        </div>
        <div class="mt-2 bg-white">
            <div class="flex-grow text-sm text-black">
                <span class="text-gray-400">Posted by <span class="text-orange-400">{{ $topic['author_id'] }}</span> 2
                    months ago</span><br />
                <div class="pt-5 font-bold">{{ $topic['title'] }}</div>
                <div class="pt-5"><span
                        class="rounded-lg bg-green-600 p-0.5 text-xs text-white hover:bg-green-400">Discussion</span>
                </div>
                <br />
                <span class="text-sm">{{ $topic['body'] }}</span>
                <br />
                <div class="mt-5 text-gray-400 hover:text-red-800"><i class="fa fa-flag fa-1x"></i></div>
                <br />

                <div class="text-xs">Comment as <span class="font-bold text-orange-400">RedDragon</span></div>
                <div class="w-10/12 border-2">
                    <textarea class="p-5 text-sm w-full" placeholder="What are yout thoughts?"></textarea>
                </div>
                <div class="pb-5 pt-5 w-10/12">
                    <button
                        class="float-right w-28 cursor-pointer rounded-lg bg-slate-400 p-1 text-sm text-white hover:text-black">Comment</button>
                </div>
            </div>

            <div>
                <span class="text-xs">fudge_friend</span> - <span class="text-xs text-gray-500">11 hr. ago</span><br />
                <div class="pt-2 text-sm">I'd like to add that not only does the US spend the most money per capita on
                    healthcare, they also spend the most tax dollars per capita on healthcare. Anyone who wants an
                    Americanized system here is either so insanely rich that expensive healthcare is cheaper than the
                    taxes
                    they pay, or they're a fucking idiot.</div>
                <div class="flex">
                    <div class="fa w-10 p-2"><i class="fa-arrow-up text-gray-400 hover:text-green-700"></i></div>
                    <div class="w-10 p-2 text-xs font-bold text-black">123</div>
                    <div class="w-10 p-2"><i class="fa fa-arrow-down text-gray-400 hover:text-red-700"></i></div>
                    <div class="p-2 text-gray-400">
                        <i class="fa fa-comment fa-1x hover:text-black"></i>
                        <span class="ml-2 text-xs hover:text-black">Reply</span>
                        <span class="ml-2 text-xs hover:text-black">Report</span>
                    </div>
                </div>

                <div class="text-xs">Comment as <span class="font-bold text-orange-400">RedDragon</span></div>
                <div class="w-10/12 border-2">
                    <div>
                        <textarea class="text-sm" rows="5" cols="90" placeholder="What are your thoughts?"></textarea>
                    </div>
                    <div><button class="float-right mt-2 rounded-lg bg-blue-600 p-1 text-white">Reply</button></div>
                </div>
            </div>
        </div>

        <div class="mt-2 ml-5 rounded-lg bg-white">
            <div class="m-5 w-64 rounded-lg bg-white p-3 text-xs border-2">
                <div class="bg-blue-800 text-white p-2 text-sm font-semibold">r/alberta Rules</div>
                <div class="p-2 border-b-2">1. Remain Civil</div>
                <div class="p-2 border-b-2">2. No racism, period.</div>
                <div class="p-2 border-b-2">3. Don't Feed the Trolls</div>
                <div class="p-2 border-b-2">4. Social media and news articles</div>
                <div class="p-2">5. Submiting multiple articles</div>
            </div>
        </div>
    </div>









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
