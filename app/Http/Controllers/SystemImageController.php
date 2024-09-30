<?php 

namespace App\Http\Controllers; 
use App\Models\SystemImage;  
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemImageController extends Controller
{
    public function store(Request $request, $systemeId)
    {

       
        // Validate the request
        $validatedData = $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120', // Validate each image
        ]);

   

      
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                $path = $image->store('uploads', 'public');
                SystemImage::create([
                    'system_id' => $systemeId,
                    'image_url' => $path,
                ]);
            }
        }
        // Redirect back with success message
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }
    public function destroy($id)
    {
        // ค้นหารูปภาพ
        $image = SystemImage::findOrFail($id);

        // ลบไฟล์รูปภาพออกจาก storage
        if (Storage::exists('public/' . $image->image_url)) {
            Storage::delete('public/' . $image->image_url);
        }

        // ลบข้อมูลจากฐานข้อมูล
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
    
}
