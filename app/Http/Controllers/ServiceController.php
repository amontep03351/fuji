<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // รับค่าค้นหาและตั้งค่าการเรียงลำดับ
        $search = htmlspecialchars($request->input('search', '')); // ป้องกัน SQL Injection
        $sortOrder = $request->input('sort_order', 'asc');
        $rowsPerPage = (int) $request->input('rows_per_page', 10); // ใช้ค่าเริ่มต้นเป็น 10
        $rowsPerPage = $rowsPerPage > 0 ? $rowsPerPage : 10; // ตรวจสอบให้แน่ใจว่าเป็นค่าที่เป็นบวก
    
        // ค้นหาและแบ่งหน้า
        $services = Service::when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name_en', 'like', "%{$search}%")
                      ->orWhere('name_jp', 'like', "%{$search}%")
                      ->orWhere('description_en', 'like', "%{$search}%")
                      ->orWhere('description_jp', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', $sortOrder) // เปลี่ยนเป็น field ที่ต้องการเรียงลำดับ
            ->paginate($rowsPerPage);
    
        // ส่งข้อมูลไปยัง View
        return view('services.index', [
            'services' => $services,
            'sortOrder' => $sortOrder,
            'rowsPerPage' => $rowsPerPage,
            'search' => $search,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // Validation for main image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // Validation for additional images
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create a new service
        $service = Service::create([
            'name_en' => $request->input('name_en'),
            'description_en' => $request->input('description_en'),
            'name_jp' => $request->input('name_jp'),
            'description_jp' => $request->input('description_jp'),
            'display_order' => $request->input('display_order'),
            'status' => $request->input('status'), 
        ]);
    
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('uploads', 'public');
            $service->update(['service_image' => $mainImagePath]);
        }
    
         
    
        // Handle additional image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                ServiceImage::create([
                    'service_id' => $service->id,
                    'image_url' => $path,
                ]);
            }
        }
    
        return redirect()->route('services.index')->with('success', 'Service created successfully!');
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
    public function edit(Service $service)
    { 
        $images = $service->images; 
        return view('services.edit', compact('service','images'));
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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_jp' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_jp' => 'required|string', 
            'display_order' => 'required|integer',
            'status' => 'required|boolean',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the Service
        $service = Service::findOrFail($id);
    
        // Update Service details
        $service->update([
            'name_en' => $request->name_en,
            'description_en' => $request->description_en,
            'name_jp' => $request->name_jp,
            'description_jp' => $request->description_jp,
            'display_order' => $request->display_order,
            'status' => $request->status,
        ]); 
       
        
        return redirect()->route('services.index')->with('success', 'services updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    { 
        $service->delete();  
        return redirect()->route('services.index')->with('success', 'Services deleted successfully');
    }
    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'service_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
        
        $service = Service::findOrFail($id);
    
        // ลบรูปภาพเก่าถ้ามี
        if (Storage::exists('public/' . $service->service_image)) {
            Storage::delete('public/' . $service->service_image);
        }
    
        // อัปโหลดรูปภาพใหม่
        $path = $request->file('service_image')->store('uploads', 'public');
    
        // บันทึกเส้นทางรูปภาพใหม่ในฐานข้อมูล
        $service->service_image = $path;
        $service->save();
    
        return redirect()->back()->with('success', 'service image updated successfully.');
    }

    public function updateOrder(Request $request)
    {
        $sortedIDs = $request->input('sortedIDs');

        foreach ($sortedIDs as $index => $id) {
            Service::where('id', $id)->update(['display_order' => $index + 1]);
        } 
        return response()->json(['success' => true]);
    } 
    public function toggleStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        Service::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => true]);
    }
}
