<div>
    <div class='p-5'>
        <span class="text-3xl text-black font-bold">Post</span>
        @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form class="my-4" wire:submit.prevent="submit">
        <div class="flex flex-row">
            <div class="bg-slate flex-grow p-2">
                <div class="flex justify-around my-8">
                    <div class="flex flex-wrap w-10/12">
                        <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Add Comment"
                            wire:model="form.comment" />
                        @error('form.comment')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="p-2 bg-blue-800 text-white rounded-lg cursor-pointer" />

                </div>
            </div>
        </div>
    </form>

    <div class="h-5 bg-slate-300"></div>


    @foreach ($comments as $comment)
        @livewire('comment', ['topic_id' => $topic_id, 'comment_id' => $comment->id])
    @endforeach
</div>
