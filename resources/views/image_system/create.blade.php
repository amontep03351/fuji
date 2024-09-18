<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('System.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title EN -->
                            <div>
                                <x-input-label for="title_en" :value="__('Title (EN)')" />
                                <x-text-input id="title_en" name="title_en" type="text" value="{{ old('title_en') }}" required autofocus />
                                <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                            </div>

                            <!-- Title JP -->
                            <div>
                                <x-input-label for="title_jp" :value="__('Title (JP)')" />
                                <x-text-input id="title_jp" name="title_jp" type="text" value="{{ old('title_jp') }}" required />
                                <x-input-error :messages="$errors->get('title_jp')" class="mt-2" />
                            </div>

                            

                            <!-- Image -->
                            <div>
                                <x-input-label for="image_url" :value="__('Image')" />
                                <input id="image_url" name="image_url" type="file" required />
                                <x-input-error :messages="$errors->get('image_url')" class="mt-2" />
                            </div>

                            <!-- Display Order -->
                            <div>
                                <x-input-label for="display_order" :value="__('Display Order')" />
                                <x-text-input id="display_order" name="display_order" type="number" min="0" value="{{ old('display_order') }}" required />
                                <x-input-error :messages="$errors->get('display_order')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Submit -->
                            <div class="flex items-center justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
