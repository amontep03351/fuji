<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 white:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md shadow-md mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">There were some problems with your input.</strong>
                    <ul class="list-disc mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contact Us Forms - Left (Form 1) and Right (Form 2) -->
            <div class="flex justify-between space-x-4">
                <!-- Left Form (Form 1) -->
                <div class="w-1/2 bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 white:text-gray-100">
                        <form id="form1" action="{{ route('contactus.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Address (EN) 1 -->
                            <div class="mb-6">
                                <label for="address_en_1" class="block text-sm font-medium text-gray-700">Address (EN) 1</label>
                                <textarea id="address_en_1" name="address_en_1" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address_en_1', $contactUs->address_en_1) }}</textarea>
                            </div>

                            <!-- Address (JP) 1 -->
                            <div class="mb-6">
                                <label for="address_jp_1" class="block text-sm font-medium text-gray-700">Address (JP) 1</label>
                                <textarea id="address_jp_1" name="address_jp_1" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address_jp_1', $contactUs->address_jp_1) }}</textarea>
                            </div>
                            <!-- Map Location -->
                            <div class="mb-6">
                                <label for="map_location_1" class="block text-sm font-medium text-gray-700">Map Location (Google Maps URL)</label>
                                <input type="url" id="map_location_1" name="map_location_1" value="{{ old('map_location_1', $contactUs->map_location_1) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <!-- Email -->
                            <div class="mb-6">
                                <label for="mail_1" class="block text-sm font-medium text-gray-700 white:text-gray-300">Email</label>
                                <input type="text" id="mail_1" name="mail_1" value="{{ old('mail_1', implode(', ', json_decode($contactUs->mail_1, true) ?? [])) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <small class="text-gray-500">Separate emails with commas</small>
                            </div>

                            <!-- Phone Numbers -->
                            <div class="mb-6">
                                <label for="tel_1" class="block text-sm font-medium text-gray-700 white:text-gray-300">Phone Numbers</label>
                                <input type="text" id="tel_1" name="tel_1" value="{{ old('tel_1', implode(', ', json_decode($contactUs->tel_1, true) ?? [])) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <small class="text-gray-500">Separate phone numbers with commas</small>
                            </div>

                            <!-- Facebook Link -->
                            <div class="mb-6">
                                <label for="facebook_link_1" class="block text-sm font-medium text-gray-700">Facebook Link</label>
                                <input type="url" id="facebook_link_1" name="facebook_link_1" value="{{ old('facebook_link_1', $contactUs->facebook_link_1) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- YouTube Link -->
                            <div class="mb-6">
                                <label for="youtube_link_1" class="block text-sm font-medium text-gray-700">YouTube Link</label>
                                <input type="url" id="youtube_link_1" name="youtube_link_1" value="{{ old('youtube_link_1', $contactUs->youtube_link_1) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                       

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Update Form 1
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Form (Form 2) -->
                <div class="w-1/2 bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 white:text-gray-100">
                        <form id="form2" action="{{ route('contactus.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Address (EN) 2 -->
                            <div class="mb-6">
                                <label for="address_en_2" class="block text-sm font-medium text-gray-700">Address (EN) 2</label>
                                <textarea id="address_en_2" name="address_en_2" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address_en_2', $contactUs->address_en_2) }}</textarea>
                            </div>

                            <!-- Address (JP) 2 -->
                            <div class="mb-6">
                                <label for="address_jp_2" class="block text-sm font-medium text-gray-700">Address (JP) 2</label>
                                <textarea id="address_jp_2" name="address_jp_2" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address_jp_2', $contactUs->address_jp_2) }}</textarea>
                            </div>

                      
 
                            <!-- Map Location -->
                            <div class="mb-6">
                                <label for="map_location_2" class="block text-sm font-medium text-gray-700">Map Location (Google Maps URL)</label>
                                <input type="url" id="map_location_2" name="map_location_2" value="{{ old('map_location_2', $contactUs->map_location_2) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Update Form 2
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize CKEditor for both forms
        ClassicEditor
            .create(document.querySelector('#address_en_1'))
            .then(editor => {
                console.log('Editor 1 was initialized.', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor for Address 1:', error);
            });

        ClassicEditor
            .create(document.querySelector('#address_en_2'))
            .then(editor => {
                console.log('Editor 2 was initialized.', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor for Address 2:', error);
            });
        ClassicEditor
            .create(document.querySelector('#address_jp_1'))
            .then(editor => {
                console.log('Editor 1 was initialized.', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor for Address 1:', error);
            });

        ClassicEditor
            .create(document.querySelector('#address_jp_2'))
            .then(editor => {
                console.log('Editor 2 was initialized.', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor for Address 2:', error);
            });
    </script>
</x-app-layout>
