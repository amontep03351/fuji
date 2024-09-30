<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Show the form for editing the contact information.
     * 
     * เหลืออัพเดทฟิว
     */
    public function edit()
    {
        $contactUs = ContactUs::first();

        if (!$contactUs) {
            $contactUs = ContactUs::create([  
                'address_en_1' => '',
                'address_en_2' => '',
                'address_jp_1' => '',
                'address_jp_2' => '',
                'mail' => json_encode([]),
                'tel' => json_encode([]),
                'linkfacebook' => '',
                'linkyoutube'  => '',
                'map_location_1' => '',
                'map_location_2' => '',
            ]);
        }
    
        // Pass the contact info to the Blade template
        return view('contact_us.index', compact('contactUs'));
    }

    /**
     * Update the contact information in storage.
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'address_en_1' => 'required|max:255',
            'address_jp_1' => 'required|max:255',
            'address_en_2' => 'required|max:255',
            'address_jp_2' => 'required|max:255',
            'mail_1' => 'nullable|email',
            'tel_1' => 'nullable|string',
            'facebook_link_1' => 'nullable|url',
            'youtube_link_1' => 'nullable|url',
            'map_location_1' => 'nullable|string',
            'map_location_2' => 'nullable|string',
        ]);
   
        // Convert emails and phone numbers to JSON format
        $mail = array_map('trim', explode(',', $request->input('mail_1', '')));
        $tel = array_map('trim', explode(',', $request->input('tel_1', '')));

        // Fetch the contact information (assuming there's only one entry)
        $contactUs = ContactUs::first();

        // Update the contact information
        $contactUs->update([
            'address_en_1' => $request->input('address_en_1'),
            'address_en_2' => $request->input('address_en_2'),
            'address_jp_1' => $request->input('address_jp_1'),
            'address_jp_2' => $request->input('address_jp_2'),
            'mail' => json_encode($mail),
            'tel' => json_encode($tel),
            'linkfacebook' => $request->input('facebook_link_1'),
            'linkyoutube' => $request->input('youtube_link_1'),
            'map_location_1' => $request->input('map_location_1'),
            'map_location_2' => $request->input('map_location_2'),
        ]);

        // Redirect back with success message
        return redirect()->route('contactus.edit')->with('success', 'Contact information updated successfully!');
    }
}
