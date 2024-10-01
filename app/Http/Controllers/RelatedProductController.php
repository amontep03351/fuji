<?php
namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\RelatedProduct;
use Illuminate\Http\Request;

class RelatedProductController extends Controller
{
    public function index($productId)
    {
        $product = Product::findOrFail($productId);

        // ดึงสินค้าที่เกี่ยวข้อง
        $relatedProducts = RelatedProduct::where('product_id', $productId)->pluck('related_product_id')->toArray();
    
        // ดึงสินค้าทั้งหมดยกเว้นสินค้าที่เลือก
        $allProducts = Product::where('id', '!=', $productId)->get(); 
        return view('related_products.index',compact('product', 'relatedProducts', 'allProducts'));
    }

    public function saveRelatedProducts(Request $request, $productId)
    {
        // ตรวจสอบข้อมูลที่ส่งมาว่าเป็น array และไม่ว่าง
        $request->validate([
            'related_product_ids' => 'array',
            'related_product_ids.*' => 'exists:products,id', // ตรวจสอบว่าแต่ละ ID มีอยู่ใน products table
        ]);
    
        // ลบข้อมูลที่เกี่ยวข้องเดิม (ถ้าต้องการ)
        RelatedProduct::where('product_id', $productId)->delete();
    
        // บันทึกสินค้าที่เกี่ยวข้องใหม่
        if ($request->related_product_ids) {
            foreach ($request->related_product_ids as $relatedProductId) {
                RelatedProduct::create([
                    'product_id' => $productId,
                    'related_product_id' => $relatedProductId,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Related products saved successfully!'); 
    }
}
