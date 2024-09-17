<?php
namespace App\Http\Controllers;
use App\Models\ProductCategoryTranslation;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
  
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortOrder = $request->input('sort_order', 'asc');
        $rowsPerPage = $request->input('rows_per_page', 10); // ใช้ค่าเริ่มต้นเป็น 10

        // ค้นหาและแบ่งหน้า
        $categories = ProductCategory::with('translations')
            ->when($search, function ($query, $search) {
                return $query->whereHas('translations', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('display_order', $sortOrder)
            ->paginate($rowsPerPage);

        return view('product_categories.index', compact('categories', 'sortOrder', 'rowsPerPage'));
    }

    

    public function create()
    {
        return view('product_categories.create');
    }

    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลซ้ำ
        $request->validate([
            'name_en' => 'required|string|max:255|unique:product_category_translations,name,NULL,id,locale,en',
            'name_jp' => 'required|string|max:255|unique:product_category_translations,name,NULL,id,locale,jp',
        ]);
        
        // สร้าง ProductCategory ใหม่
        $category = ProductCategory::create();

        // สร้างการแปลภาษา
        ProductCategoryTranslation::create([
            'product_category_id' => $category->id,
            'locale' => 'en',
            'name' => $request->input('name_en'),
        ]);

        ProductCategoryTranslation::create([
            'product_category_id' => $category->id,
            'locale' => 'jp',
            'name' => $request->input('name_jp'),
        ]);

        return redirect()->route('product-categories.index')
                         ->with('success', 'Product Category created successfully.');
    }


    public function edit(ProductCategory $productCategory)
    {
        return view('product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        // ตรวจสอบข้อมูลซ้ำ
        $request->validate([
            'name_en' => 'required|string|max:255|unique:product_category_translations,name,' . $productCategory->id . ',product_category_id,locale,en',
            'name_jp' => 'required|string|max:255|unique:product_category_translations,name,' . $productCategory->id . ',product_category_id,locale,jp',
        ]);

        // อัพเดทข้อมูลการแปลภาษา
        $productCategory->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['name' => $request->input('name_en')]
        );

        $productCategory->translations()->updateOrCreate(
            ['locale' => 'jp'],
            ['name' => $request->input('name_jp')]
        );

        return redirect()->route('product-categories.index')
                         ->with('success', 'Product Category updated successfully.');
    }

    public function destroy(ProductCategory $productCategory)
    {
        // ลบรายการที่เลือก
        $productCategory->delete();
    
        // อัปเดตลำดับใหม่หลังจากลบ
        $this->reorderDisplayOrder();
    
        return redirect()->route('product-categories.index')->with('success', 'Category deleted successfully.');
    }
    private function reorderDisplayOrder()
    {
        // ดึงรายการทั้งหมดมาเรียงลำดับใหม่
        $categories = ProductCategory::orderBy('display_order')->get();

        // ใช้ loop เพื่ออัปเดตลำดับใหม่
        foreach ($categories as $index => $category) {
            $category->update(['display_order' => $index + 1]); // ลำดับจะเริ่มที่ 1
        }
    }
    
    public function updateOrder(Request $request)
    {
        $sortedIDs = $request->input('sortedIDs');

        foreach ($sortedIDs as $index => $id) {
            ProductCategory::where('id', $id)->update(['display_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    } 
  
    public function toggleStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        ProductCategory::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => true]);
    }
    

}
