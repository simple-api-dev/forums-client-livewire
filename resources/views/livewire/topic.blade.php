<div>
    <div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
        <div>
            <button wire:click="upvoteTopic({{ $topic_id }})" title="Upvote"><i
                    class="p-2 fa fa-arrow-up fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>
        <div class="bg-gray-50 p-2 font-bold w-10">{{ $score }}</div>
        <div>
            <button wire:click="downvoteTopic({{ $topic_id }})" title="Downvote"><i
                    class="p-2 fa fa-arrow-down fa-1x p-5 text-gray-300 hover:text-red-500"></i></button>
        </div>

        <div class="text-slate-400 flex-grow">
            <a class="text-2xl text-black hover:text-blue-700" href="/post/{{ $topic_id }}">{{ $title }}</a>
            <br><span class="">{{ $body }}</span><br>
            <span class="text-gray-300">Posted by {{ $author_id }} - [{{ $status }}]</span>
        </div>
        <div><a href="/editpost/{{$topic_id}}/{{$topic_slug}}"><button title="Edit"><i class="fa fa-pen fa-1x p-5 text-gray-300"></i></button></a>
        </div>
        <div><button wire:click="destroy({{ $topic_id }})" title="Delete"><i
                    class="fa fa-trash fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><button wire:click="report({{ $topic_id }})" title="Report"><i
                    class="fa fa-flag fa-1x p-5 text-gray-300"></i></button>
        </div>
        <div><i class="fa fa-ban fa-1x p-5 text-gray-300"></i></div>
    </div>
    {{-- @if ($topic_reports)
        @foreach ($topic_reports as $report)
            @livewire('report', ['report' => $report])
        @endforeach
    @endif --}}
</div>
