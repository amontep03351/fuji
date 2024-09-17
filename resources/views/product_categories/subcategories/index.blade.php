<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sub Category for {{ $category->translations->where('locale', 'en')->first()->name }}
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
               <!-- Search Form and Sort Button -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6 flex items-center space-x-4">
            <form method="GET" action="{{ route('product-categories.subcategories.index', $category->id) }}" class="flex items-center space-x-4">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by name"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    />
                    <button
                        type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Search
                    </button>
                </form> 
            </div> 
                 <!-- Table -->
                 <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Add this above the table -->
                    <div class="flex justify-between mb-6">
                        
                        <div>
                            <form action="{{ route('product-categories.subcategories.index', $category->id) }}" method="GET">
                                <div class="flex items-center space-x-4">
                                    <label for="rows-per-page" class="text-sm font-medium text-gray-900">Rows per page:</label>
                                    <select id="rows-per-page" name="rows_per_page" class="border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                                        <option value="10" {{ request('rows_per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('rows_per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('rows_per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('rows_per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </form>

                        </div>

                        <!-- Existing Add New button -->
                        <a href="{{ route('product-categories.create_sub', $category) }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Add New Subcategory
                        </a>
                    </div>

                    <!-- Data Table -->
                    <div class="overflow-x-auto">
                        <table id="sortable-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name (EN)</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name (JP)</th>  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>   
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                @forelse ($subcategories as $subcategory)
                                <tr data-id="{{ $subcategory->id }}" data-parent_id="{{ $subcategory->parent_id  }}" class="sortable-row hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $subcategory->display_order }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $subcategory->translations->where('locale', 'en')->first()->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $subcategory->translations->where('locale', 'jp')->first()->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer status-checkbox"
                                                    data-id="{{ $subcategory->id }}"
                                                    {{ $subcategory->status === 1 ? 'checked' : '' }}>
                                                <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4"> 
                                            <a href="{{ route('product-categories.edit', $subcategory->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                           <!-- Delete Form -->
                                            <form action="{{ route('product-categories.subcategories.destroy', [$category->id, $subcategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
                                                @csrf
                                                @method('DELETE') 
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">No subcategories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
         
                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Script for SortableJS -->
     <script>
        $(document).ready(function() {
            $('.status-checkbox').on('change', function() {
                var checkbox = $(this);
                var id = checkbox.data('id');
                var status = checkbox.is(':checked') ? 1 : 0; // 1 for active, 0 for inactive
                document.getElementById('loading-spinner').classList.remove('hidden');
                fetch('{{ route('product-categories.toggle-status') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        id: id,
                        status: status
                    }),
                }).then(response => response.json())
                .then(data => {
                    // ซ่อน loading spinner เมื่อการทำงานเสร็จสิ้น
                    document.getElementById('loading-spinner').classList.add('hidden');

                    if (data.success) {
                        //location.reload();
                    } else {
                        alert('Failed to update.');
                    }
                }).catch(error => {
                    // ซ่อน loading spinner เมื่อเกิดข้อผิดพลาด
                    document.getElementById('loading-spinner').classList.add('hidden');
                    alert('An error occurred: ' + error.message);
                }); 
            });
        });
       
        document.addEventListener('DOMContentLoaded', function() {
            var sortable = Sortable.create(document.getElementById('sortable-table').querySelector('tbody'), {
                onEnd: function(evt) {
                    // แสดง loading spinner
                    document.getElementById('loading-spinner').classList.remove('hidden');

                    let sortedIDs = Array.from(document.querySelectorAll('#sortable-table tbody .sortable-row'))
                        .map(row => row.getAttribute('data-id'));
                    let parentId = Array.from(document.querySelectorAll('#sortable-table tbody .sortable-row'))
                        .map(row => row.getAttribute('data-parent_id'));
                    
                    fetch('{{ route('product-categories.update-order-sub') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            sortedIDs: sortedIDs,
                            parentId:parentId
                        }),
                    }).then(response => response.json())
                    .then(data => {
                        // ซ่อน loading spinner เมื่อการทำงานเสร็จสิ้น
                        document.getElementById('loading-spinner').classList.add('hidden');

                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Failed to update order.');
                        }
                    }).catch(error => {
                        // ซ่อน loading spinner เมื่อเกิดข้อผิดพลาด
                        document.getElementById('loading-spinner').classList.add('hidden');
                        alert('An error occurred: ' + error.message);
                    });
                },
            });
            
        });
    </script> 
</x-app-layout>
