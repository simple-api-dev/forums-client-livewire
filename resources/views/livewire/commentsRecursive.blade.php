@foreach ($comments as $comment)
    @livewire('comment', ['topic_id' => $topic_id, 'comment_id' => $comment['id']])
    @if (!empty($comment->comments))
        @include('livewire.commentsRecursive', ['comments' => $comment->comments])
    @endif
@endforeach
