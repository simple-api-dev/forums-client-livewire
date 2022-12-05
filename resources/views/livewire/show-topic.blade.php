<div class="flex flex-row m-5 border-2 border-white hover:border-2 hover:border-blue-300">
    <div>
        <button wire:click="upvoteTopic({{ $topic->id }})"><i class="p-2 fa fa-arrow-up fa-1x text-gray-300 hover:text-red-500"></i></button>
    </div>
    <div class="bg-gray-50 p-2 font-bold">{{ $topic->score }}</div>
    <div>
        <button wire:click="downvoteTopic({{ $topic->id }})"><i class="p-2 fa fa-arrow-down fa-1x text-gray-300 hover:text-red-500"></i></button>
    </div>
    <div><i class="fa fa-file-o fa-1x text-gray-300"></i></div>
    <div><i class="fa fa-picture-o fa-1x text-gray-300"></i></div>
    <div><i class="fa fa-share fa-1x text-gray-300"></i></div>

    <div class="text-slate-400">
        <span class='text-2xl'>{{ $topic->title }}</span>
        <br>{{ $topic->body }}<br>
        <span class="text-gray-300">Posted by u/TomatilloAbject7419 10 hours ago</span>
    </div>
    <div><i class="fa fa-comment-o fa-1x text-gray-300"></i></div>
    <div><i class="fa fa-flag fa-1x text-gray-300"></i></div>
    <div><i class="fa fa-check-square-o fa-1x text-gray-300"></i></div>
    <div><i class="fa fa-ban fa-1x text-gray-300"></i></div>
</div>
