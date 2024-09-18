<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Image Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('image_sliders.update', $imageSlider->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title EN -->
                            <div>
                                <x-input-label for="title_en" :value="__('Title (EN)')" />
                                <x-text-input id="title_en" name="title_en" type="text" value="{{ old('title_en', $imageSlider->title_en) }}" required autofocus />
                                <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                            </div>

                            <!-- Title JP -->
                            <div>
                                <x-input-label for="title_jp" :value="__('Title (JP)')" />
                                <x-text-input id="title_jp" name="title_jp" type="text" value="{{ old('title_jp', $imageSlider->title_jp) }}" required />
                                <x-input-error :messages="$errors->get('title_jp')" class="mt-2" />
                            </div>

                            <!-- Description EN -->
                            <div>
                                <x-input-label for="description_en" :value="__('Description (EN)')" />
                                <textarea id="description_en" name="description_en" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('description_en', $imageSlider->description_en) }}</textarea>
                                <x-input-error :messages="$errors->get('description_en')" class="mt-2" />
                            </div>

                            <!-- Description JP -->
                            <div>
                                <x-input-label for="description_jp" :value="__('Description (JP)')" />
                                <textarea id="description_jp" name="description_jp" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('description_jp', $imageSlider->description_jp) }}</textarea>
                                <x-input-error :messages="$errors->get('description_jp')" class="mt-2" />
                            </div>

                            <!-- Image -->
                            <div>
                                <x-input-label for="image_url" :value="__('Image')" />
                                @if ($imageSlider->image_url)
                                    <img src="{{ asset('storage/' . $imageSlider->image_url) }}" alt="Image" class="w-24 h-24 object-cover">
                                @endif
                                <input id="image_url" name="image_url" type="file" />
                                <x-input-error :messages="$errors->get('image_url')" class="mt-2" />
                            </div>

                            <!-- Display Order -->
                            <div>
                                <x-input-label for="display_order" :value="__('Display Order')" />
                                <x-text-input id="display_order" name="display_order" type="number" min="0" value="{{ old('display_order', $imageSlider->display_order) }}" required />
                                <x-input-error :messages="$errors->get('display_order')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="1" {{ old('status', $imageSlider->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $imageSlider->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                        
                               <!-- Submit Button -->
                            <div class="flex items-center justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
