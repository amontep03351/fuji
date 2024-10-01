<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Related Products for:  
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('related-products.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="related_products" class="block text-gray-700 text-sm font-bold mb-2">
                                Select Related Products
                            </label>
                            <select name="related_product_ids[]" id="related_products" class="form-multiselect block w-full mt-1" multiple>
                            @forelse ($products as $product)
                                 {{ $product->id }}
                            @empty
                            @endforelse
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                Save Related Products
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
