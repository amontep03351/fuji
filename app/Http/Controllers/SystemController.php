<?php

namespace App\Http\Controllers;


use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 10);

        $query = System::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                  ->orWhere('title_jp', 'like', "%{$search}%");
            });
        }

        $image_system = $query->orderBy('display_order')
                              ->paginate($perPage);

        return view('image_system.index', compact('image_system'));
    }

    public function create()
    {
        return view('image_system.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_jp' => 'required|string|max:255', 
            'image_url' => 'nullable|image|max:5120',
            'display_order' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $System = new System();
        $System->title_en = $request->input('title_en');
        $System->title_jp = $request->input('title_jp'); 
        $System->display_order = $request->input('display_order');
        $System->status = $request->input('status');

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $System->image_url = $imagePath;
        }

        $System->save();

        return redirect()->route('System.index')->with('success', 'Image Slider created successfully.');
    }

    public function edit(System $System)
    {
        return view('image_system.edit', compact('System'));
    }

    public function update(Request $request, System $System)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_jp' => 'required|string|max:255', 
            'image_url' => 'nullable|image|max:5120',
            'display_order' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $System->title_en = $request->input('title_en');
        $System->title_jp = $request->input('title_jp'); 
        $System->display_order = $request->input('display_order');
        $System->status = $request->input('status');

        if ($request->hasFile('image_url')) {
            // Delete old image if it exists
            if ($System->image_url) {
                Storage::disk('public')->delete($System->image_url);
            }

            $imagePath = $request->file('image_url')->store('images', 'public');
            $System->image_url = $imagePath;
        }

        $System->save();

        return redirect()->route('System.index')->with('success', 'Image Slider updated successfully.');
    }

 

    public function destroy(System $System)
    {
        if ($System->image_url) {
            Storage::disk('public')->delete($System->image_url);
        }

        $System->delete();

        return redirect()->route('System.index')->with('success', 'Image Slider deleted successfully.');
    }
    public function updateOrder(Request $request)
    {
        $sortedIDs = $request->input('sortedIDs');

        foreach ($sortedIDs as $index => $id) {
            System::where('id', $id)->update(['display_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    } 
    public function toggleStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        System::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => true]);
    }
}
