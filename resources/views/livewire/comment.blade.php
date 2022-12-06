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
    {{-- @if ($topic_reports)
        @foreach ($topic_reports as $report)
            @livewire('report', ['report' => $report])
        @endforeach
    @endif --}}
</div>
