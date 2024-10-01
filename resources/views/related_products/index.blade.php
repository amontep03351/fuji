<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Related Products for:   
                @if($product->translations->isNotEmpty())
                    {{ $product->translations->first()->name }} <!-- ชื่อของ translation ที่ locale = 'en' -->
                @else
                    {{ __('No translation available') }}
                @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('products.save-related-products', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                    <label for="related_products" class="block text-gray-700 text-sm font-bold mb-2">
                        Choose products that are related to <strong>{{ $product->translations->first()->name ?? 'Product' }}</strong>
                    </label>
                        <select name="related_product_ids[]" id="related_products" class="form-multiselect block w-full mt-1" multiple>
                            @foreach ($allProducts as $product)
                                <option value="{{ $product->id }}" 
                                    @if (in_array($product->id, $relatedProducts)) selected @endif>
                                    {{ $product->translations->where('locale', 'en')->first()->name }}
                                </option>
                            @endforeach
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
