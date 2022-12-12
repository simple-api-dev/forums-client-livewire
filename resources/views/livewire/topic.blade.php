<div>
    <div class="flex  p-5">
        <div class="mt-2 bg-white">
            <div class="fa w-10 p-2" wire:click="upvoteTopic({{ $topic['id'] }})" title="Upvote Topic"><i
                    class="fa-arrow-up text-gray-400 hover:text-green-700"></i></div>
            <div class="w-10 p-2 text-xs font-bold text-black">{{ $topic['score'] }}</div>
            <div class="w-10 p-2" wire:click="downvoteTopic({{ $topic['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down text-gray-400 hover:text-red-700"></i></div>
        </div>
        <div class="mt-2 bg-white flex-grow">
            <div class="flex-grow text-sm text-black">
                <span class="text-gray-400">Posted by <span class="text-orange-400">{{ $topic['author_id'] }}</span>
                    2
                    months ago</span><br />
                <div class="pt-5 font-bold">{{ $topic['title'] }}</div>
                <div class="pt-5">
                    @foreach ($topic['tag_names'] as $tag)
                        <span
                            class="rounded-lg bg-green-600 p-0.5 text-xs text-white hover:bg-green-400">{{ $tag }}</span>
                    @endforeach
                </div>
                <br />
                <span class="text-sm">{{ $topic['body'] }}</span>
                <br />
                <div class="mt-5 text-gray-400 hover:text-red-800"><i class="fa fa-flag fa-1x"></i></div>
                <br />

                <div class="text-xs">Comment as <span class="font-bold text-orange-400">RedDragon</span></div>
                <div class="w-10/12 border-2">
                    <textarea class="p-5 text-sm w-full" placeholder="What are yout thoughts?" wire:model="form.body"></textarea>
                    @error('form.body')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pb-10 pt-5 w-10/12">
                    <button class="float-right cButton" wire:click="addComment({{ $topic['id'] }})">Comment</button>
                </div>
            </div>
            @foreach ($topic['comments'] as $comment)
                <livewire:comment :topic_id="$topic['id']" :comment="$comment" :wire:key="$comment['id'] . rand()" />
            @endforeach
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
</div>
