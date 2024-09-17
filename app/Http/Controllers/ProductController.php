<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategoryTranslation;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // รับค่าค้นหาและตั้งค่าการเรียงลำดับ
        $search = $request->input('search', '');
        $sortOrder = $request->input('sort_order', 'asc');
        $rowsPerPage = (int) $request->input('rows_per_page', 10);
        $rowsPerPage = $rowsPerPage > 0 ? $rowsPerPage : 10;

        // ค้นหาและแบ่งหน้า
        $products = Product::with('translations')
            ->when($search, function ($query, $search) {
                return $query->whereHas('translations', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('display_order', $sortOrder)
            ->paginate($rowsPerPage);

        // ส่งข้อมูลไปยัง View
        return view('product.index', [
            'products' => $products,
            'sortOrder' => $sortOrder,
            'rowsPerPage' => $rowsPerPage,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::with('translations')->get(); 
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_jp' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_jp' => 'required|string',
            'display_order' => 'required|integer',
            'status' => 'required|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Adjust as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new product
        $product = Product::create([
            'display_order' => $request->input('display_order'),
            'status' => $request->input('status'),
        ]);

        // Save the product translations
        $product->translations()->create([
            'locale' => 'en',
            'name' => $request->input('name_en'),
            'description' => $request->input('description_en'),
        ]);

        $product->translations()->create([
            'locale' => 'jp',
            'name' => $request->input('name_jp'),
            'description' => $request->input('description_jp'),
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
