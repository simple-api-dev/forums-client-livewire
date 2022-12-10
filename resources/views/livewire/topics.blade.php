<div>
    <div class="flex flex-row">
        <div class="flex-grow m-5">
            {{-- 
              Add new topic bar
           --}}
            <div class="flex bg-white p-0.5 mb-5">
                <div><i class="fa fa-plus fa-1x py-2"></i></div>
                <div wire:click="$toggle('showDiv')"
                    class="w-full bg-slate-100 p-0.5 text-sm text-gray-400 border-2 py-1 border-white hover:border-2 hover:border-blue-100">
                    Create Topic
                </div>
            </div>
            {{-- 
            topics
            --}}
            @foreach ($topics as $topic)
                <div class="flex border-2 bg-white p-1">
                    <div class="flex-grow text-sm text-black font-semibold">
                        <a href="/topic/{{ $topic['slug'] }}">
                            {{ $topic['title'] }}
                        </a>
                        @foreach ($topic['tag_names'] as $tag)
                            <span
                                class="rounded-lg bg-green-600 p-0.5 text-xs text-white hover:bg-green-400">{{ $tag }}</span>
                        @endforeach
                        <br />
                        <span class="text-gray-400 text-xs">Posted by {{ $topic['author_id'] }} <span
                                class="text-red-900 line-through">2 months ago</span></span>
                    </div>
                    <div class="p-2 text-gray-400 hover:text-black"><a href="/topic/{{ $topic['slug'] }}"><i
                                class="fa fa-comment fa-1x"></a></i></div>
                </div>
            @endforeach
        </div>
        {{-- 
        Right panel 
        --}}
        <div class="pt-5 pr-5">
            <div class="w bg-slate-200">
                <div class="ml-5 w-64 rounded-lg bg-white p-3 text-xs pb-10">
                    <div class="bg-blue-500 text-white p-3">About Community</div>
                    <div class="p-2"> Your personal Reddit frontpage. Come here to check in with your favorite
                        communities. </div>
                    <div class="float-right">
                        <button wire:click="$toggle('showDiv')" class="cButton">Create
                            Topic</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 
    add topic form
    --}}
    @if ($showDiv)
        <div class="fixed bottom-1/4 left-1/4 w-1/2 rounded-lg bg-slate-100 p-5">
            <div class="float-right font-semibold text-sm text-gray-400 hover:text-black"
                wire:click="$toggle('showDiv')">
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
                <button class="float-right cButton" wire:click="addTopic">Save</button>
            </div>
        </div>
    @endif
</div>
