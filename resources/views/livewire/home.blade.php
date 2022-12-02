<div class="w-10/12 my-10 flex">
    @foreach($topics as $topic)
        <div class="w-full">
            <span class="font-extrabold m-5">{{$topic->title}}</span>
            <span class="">{{$topic->body}}</span>
        </div>
    @endforeach
</div>
