<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteTopic({{ $topicid }})" title="Upvote"><i
                    class="p-2 fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $score }}</div>
        <div>
            <button wire:click="downvoteTopic({{ $topicid }})" title="Downvote"><i
                    class="p-2 fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            <span class='text-2xl text-black'>{{ $title }}</span>
            <br><span class="">{{ $body }}</span><br>
            <span class="text-gray-300">Posted by {{ $author_id }}</span>
        </div>
        <div><button wire:click="destroy({{ $topicid }})" title="Delete"><i class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><button wire:click="report({{ $topicid }})" title="Report"><i class="fa fa-flag fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><i class="fa fa-ban fa-1x p-5 text-gray-300"></i></div>
    </div>
    @if ($topic_reports)
        @foreach ($topic_reports as $report)
            @livewire('report', ['report' => $report])
        @endforeach
    @endif
</div>
