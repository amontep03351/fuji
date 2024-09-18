<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        // Check if there's an existing record, otherwise create a new one with default values
        $aboutUs = AboutUs::first();

        if (!$aboutUs) {
            $aboutUs = new AboutUs([
                'title_en' => '',
                'title_jp' => '',
                'description_en' => '',
                'description_jp' => '',
                'image' => ''
            ]);
        }

        return view('aboutus.index', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_jp' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_jp' => 'nullable|string',
        ]);

        // Find or create the AboutUs record
        $aboutUs = AboutUs::first();

        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }

        // Update the AboutUs record
        $aboutUs->title_en = $request->input('title_en');
        $aboutUs->title_jp = $request->input('title_jp');
        $aboutUs->description_en = $request->input('description_en');
        $aboutUs->description_jp = $request->input('description_jp');
        $aboutUs->save();

        return redirect()->route('aboutus.index')->with('success', 'About Us details updated successfully!');
    }

    public function updateImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120', // 5 MB max
        ]);
    
        // Find or create the AboutUs record
        $aboutUs = AboutUs::first();
    
        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutUs->image && Storage::exists('public/' . $aboutUs->image)) {
                Storage::delete('public/' . $aboutUs->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('aboutus', 'public');
            $aboutUs->image = $imagePath;
            $aboutUs->save();
        } else {
            dd('No image file found in request.');
        }
    
        return redirect()->route('aboutus.index')->with('success', 'Image updated successfully!');
    }
    
}
