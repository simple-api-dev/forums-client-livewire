@if (!empty($comment['comments']))
    @foreach ($comment['comments'] as $comment)
        <livewire:comments :topic_id="$topic_id" :comments="$comment" :wire:key="$loop->index . rand()" />
        @if (!empty($comment['comments']))
            @include('livewire.commentsRecursive', [
                'topic_id' => $topic_id,
                'comments' => $comment['comments'],
            ]);
        @endif
    @endforeach
@endif
