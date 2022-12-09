<div>
    {{-- 
    add topic form
 --}}
    @if ($showDiv)
        <div class="absolute top-200 left-200 w-1/2 rounded-lg bg-slate-100 p-5">
            <div class="float-right font-semibold text-sm text-gray-400 hover:text-black" wire:click="$toggle('showDiv')">
                <span class="text-lg">x</span> close
            </div>
            <div class="font-semibold">Create a Topic</div>
            <div class="h-0.5 bg-white"></div>
            <div class="mt-2">
                <input class="w-full p-1 text-sm" type="text" class="w-full border-2" placeholder="Title"
                    wire:model="form.title" />
                @error('form.title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>
            <div class="mt-1">
                <textarea class="w-full border-2 p-1 text-sm" placeholder="Text (required)" rows="8" wire:model="form.body"></textarea>
                @error('form.body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>
            <div class="mt-2">
                <span class="text-sm">Status</span>
                <select class="w-full text-sm text-gray-400" wire:model="form.status">
                    <option value="Active" selected>Active</option>
                    <option value="Draft">Draft</option>
                    <option value="Pending Review">Pending Review</option>
                    <option value="Locked">Locked</option>
                    <option value="Removed">Removed</option>
                </select>
            </div>
            <div class="mt-2">
                <span class="text-sm">Type</span>
                <select class="w-full text-sm text-gray-400" wire:model="form.type">
                    <option value="Post" selected>Post</option>
                    <option value="Video">Video</option>
                    <option value="Article">Article</option>
                    <option value="Image">Image</option>
                </select>
            </div>
            <div class="mt-2">
                <span class="text-sm">Url</span>
                <input class="w-full text-sm text-gray-400" type="text" class="border-spacing-2 rounded border-2"
                    placeholder="Url" wire:model="form.url" />
            </div>
            <div class="mt-2">
                <span class="text-sm">Tags</span>
                <select class="w-full text-sm text-gray-400" wire:model="form.tags" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2 pb-5">
                <button
                    class="float-right w-28 cursor-pointer rounded-lg bg-slate-400 p-1 text-sm text-white hover:text-black"
                    wire:click="addTopic">Save</button>
            </div>
        </div>
    @endif
    {{-- 
Topic list 
--}}



    <div class="bg-slate-200 p-5">
        <div class="rounded-lg bg-white p-3">
            <div wire:click="$toggle('showDiv')"
                class="rounded-lg bg-slate-100 p-2 text-sm text-gray-400 border-2 border-white hover:border-2 hover:border-blue-300">
                <i class="fa fa-plus fa-1x p-3"></i>Add a new Topic
            </div>
        </div>
        <div class="h-5 bg-slate-200"></div>


        <div class="flex flex-row">
            <div class="flex-grow">

                @foreach ($topics as $topic)
                    <div class="flex border-2 bg-white">
                        <div class="fa bg-gray-50 p-2"><i class="fa-arrow-up text-gray-400 hover:text-green-700"></i>
                        </div>
                        <div class="bg-gray-50 p-2 text-xs font-bold text-black">{{ $topic['score'] }}</div>
                        <div class="bg-gray-50 p-2"><i class="fa fa-arrow-down text-gray-400 hover:text-red-700"></i>
                        </div>
                        <div class="p-4"><i class="fa fa-image fa-1x text-gray-400 hover:text-black"></i></div>
                        <div class="flex-grow text-sm text-black">
                            <a href="/topic/{{ $topic['slug'] }}">
                                {{ $topic['title'] }}
                            </a>
                            @foreach ($topic['tag_names'] as $tag)
                                <span
                                    class="rounded-lg bg-green-600 p-0.5 text-xs text-white hover:bg-green-400">{{$tag}}</span>
                            @endforeach
                            <br />
                            <span class="text-gray-400">Posted by {{ $topic['author_id'] }} 2 months ago</span>
                        </div>
                        <div class="p-2 text-gray-400 hover:text-black"><a href="/topic/{{ $topic['slug'] }}"><i
                                    class="fa fa-comment fa-1x"></a></i></div>
                        <div class="p-2 text-gray-400 hover:text-red-800"><i class="fa fa-flag fa-1x"></i></div>
                        <div class="p-2 text-3xl">
                            <span class=" hover:bg-slate-100">...</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <div class="w bg-slate-200">
                    <div class="ml-5 w-64 rounded-lg bg-white p-3 text-xs">
                        Your personal Reddit frontpage. Come here to check in with your favorite communities.
                        <button wire:click="$toggle('showDiv')"
                            class="m-2 w-56 rounded-lg bg-blue-600 p-1 text-sm font-medium text-white hover:bg-blue-400">Create
                            Topic</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
