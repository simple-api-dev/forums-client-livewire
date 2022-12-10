<div class="border-l-2 ml-2 bg-white py-1 px-1">
    <div>
        <span class="text-xs">{{ $comment['author_id'] }}</span> - <span class="text-xs text-gray-500">11 hr.
            ago</span><br />
        <div class="pt-2 text-sm"> {{ $comment['body'] }}</div>
        <div class="flex">
            <div class="fa w-10 p-2" wire:click="upvoteComment({{ $comment['id'] }})" title="Upvote Comment"><i
                    class="fa-arrow-up text-gray-400 hover:text-green-700"></i></div>
            <div class="w-10 p-2 text-xs font-bold text-black"> {{ $comment['score'] }}</div>
            <div class="w-10 p-2" wire:click="downvoteComment({{ $comment['id'] }})" title="Downvote"><i
                    class="fa fa-arrow-down text-gray-400 hover:text-red-700"></i></div>
            <div class="p-2 text-gray-400">
                <i class="fa fa-comment fa-1x hover:text-black" wire:click="$toggle('showDiv')"></i>
                <span class="ml-2 text-xs hover:text-black">Report</span>
            </div>
        </div>

        @if ($showDiv)
            <div class="text-xs">Comment as <span class="font-bold text-orange-400">RedDragon</span></div>
            <div class="w-10/12 border-2">
                <div>
                    <textarea class="text-sm" rows="5" cols="90" placeholder="What are your thoughts?" wire:model="form.body"></textarea>
                    @error('form.body')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div><button class="float-right cButton"
                        wire:click="addComment({{ $comment['id'] }})">Reply</button></div>
            </div>
        @endif
    </div>

    <div class="ml-2 py-1 px-1">
        @foreach ($comment['comments'] as $comment)
            <div class="border-slate-200">
                <livewire:comment :topic_id="$topic_id" :comment="$comment" :wire:key="$comment['id'] . rand()" />
            </div>
        @endforeach
    </div>
</div>
