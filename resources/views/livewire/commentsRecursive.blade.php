@foreach ($comments as $comment)
    {{-- @livewire('reply', ['topic_id' => $topic_id, 'comment' => $comment]) --}}
    @livewire('comment', ['topic_id' => $topic_id, 'comment_id' => $comment['id']])
    @if (!empty($comment->comments))
     <div>HERE!!!</div>
        @include('livewire.commentsRecursive', ['comments' => $comment->comments])
    @endif
@endforeach


