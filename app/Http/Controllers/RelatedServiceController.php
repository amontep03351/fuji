<?php

namespace App\Http\Controllers;

use App\Models\Service; 
use App\Models\RelatedService;
use Illuminate\Http\Request;

class RelatedServiceController extends Controller
{
    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId);

        // ดึงบริการที่เกี่ยวข้อง
        $relatedServices = RelatedService::where('service_id', $serviceId)->pluck('related_service_id')->toArray();
    
        // ดึงบริการทั้งหมด ยกเว้นบริการที่เลือก
        $allServices = Service::where('id', '!=', $serviceId)->get(); 
        return view('related_services.index', compact('service', 'relatedServices', 'allServices'));
    }

    public function saveRelatedServices(Request $request, $serviceId)
    {
        // ตรวจสอบข้อมูลที่ส่งมาว่าเป็น array และไม่ว่าง
        $request->validate([
            'related_service_ids' => 'array',
            'related_service_ids.*' => 'exists:services,id', // ตรวจสอบว่าแต่ละ ID มีอยู่ใน services table
        ]);
    
        // ลบข้อมูลที่เกี่ยวข้องเดิม (ถ้าต้องการ)
        RelatedService::where('service_id', $serviceId)->delete();
    
        // บันทึกบริการที่เกี่ยวข้องใหม่
        if ($request->related_service_ids) {
            foreach ($request->related_service_ids as $relatedServiceId) {
                RelatedService::create([
                    'service_id' => $serviceId,
                    'related_service_id' => $relatedServiceId,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Related services saved successfully!'); 
    }
}
