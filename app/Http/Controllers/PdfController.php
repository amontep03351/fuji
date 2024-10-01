<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductPdf; // แทนที่ Pdf ด้วย Model ที่คุณใช้งานจริง
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function destroy($id)
    {
        // ค้นหาไฟล์ PDF ตาม ID
        $ProductPdf = ProductPdf::findOrFail($id);

        // ลบไฟล์จาก storage
        Storage::delete('public/' . $ProductPdf->pdf_url); // ตรวจสอบให้แน่ใจว่า path นี้ถูกต้อง

        // ลบข้อมูลจากฐานข้อมูล
        $ProductPdf->delete();

        return redirect()->back()->with('success', 'PDF file deleted successfully.');
    }
     // ฟังก์ชันสำหรับเพิ่มไฟล์ PDF
     public function addFilePdf(Request $request, Product $product)
     {
         // ตรวจสอบการอัปโหลดไฟล์
         $request->validate([
             'pdf_files.*' => 'required|file|mimes:pdf|max:5120', // จำกัดประเภทไฟล์และขนาดสูงสุด 5MB
         ]);
 
         // อัปโหลดไฟล์ PDF ใหม่
         if ($request->hasFile('pdf_files')) {
             foreach ($request->file('pdf_files') as $file) {
                 $path = $file->store('pdfs', 'public'); // สร้างโฟลเดอร์ pdfs ใน storage/app/public
 
                 // บันทึกข้อมูลในฐานข้อมูล
                 ProductPdf::create([
                     'pdf_url' => $path,
                     'product_id' => $product->id, // เชื่อมโยงกับผลิตภัณฑ์
                 ]);
             }
         }
         return redirect()->back()->with('success', 'PDF file(s) added successfully.'); 
     }
}
