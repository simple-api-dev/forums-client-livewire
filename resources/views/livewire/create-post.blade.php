<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Create Topic</h1>
        <hr>

        @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
        @endif

        <form class="my-4" wire:submit.prevent="submit">
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Topic Title"
                        wire:model="form.title" />
                    @error('form.title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Topic Body"
                        wire:model="form.body" />
                    @error('form.body')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <label class="font-extrabold" for="type">Type</label>
                    <div>
                        <select name="type" id="type" wire:model="form.type">
                            <option value="Post">Post</option>
                            <option value="Video">Video</option>
                            <option value="Url">Url</option>
                            <option value="Image">Image</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <label class="font-extrabold" for="type">Status</label>
                    <div>
                        <select name="status" id="status" wire:model="form.status">
                            <option value="Active">Active</option>
                            <option value="Draft">Draft</option>
                            <option value="Pending Review">Pending Review</option>
                            <option value="Locked">Locked</option>
                        </select>
                    </div>
                </div>
            </div>

            @if (!empty($tags))
                <div class="flex justify-around my-8">
                    <div class="flex flex-wrap w-10/12">
                        <label class="font-extrabold" for="type">Tags</label>
                        <div>
                            <select name="tags[]" id="tags" multiple wire:model="form.tags">
                                @foreach ($tags as $key => $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="submit" value="Save"
                        class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
    </section>
</div>
