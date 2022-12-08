
@foreach ($comments as $comment)
    {{-- @livewire('comment', ['topic_id' => $topic_id, 'comment_id' => $comment['id']]) --}}
    <livewire:comment :topic_id="$topic_id" :comment="$comment" :wire:key="$loop->index . rand()" />
    @if (!empty($comment->comments))
        @include('livewire.commentsRecursive', ['comments' => $comment->comments])
    @endif
@endforeach
