<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BladeEditorController extends Controller
{
    // Save text or image updates
    public function updateContent(Request $request)
    {
        foreach($request->updates as $update){
            $exists = DB::table('blade_contents')->where('section', $update['section'])->exists();
            if($exists){
                DB::table('blade_contents')->where('section', $update['section'])
                    ->update([
                        'content' => $update['content'], 
                        'type' => $update['type'] ?? 'text', 
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('blade_contents')->insert([
                    'section' => $update['section'],
                    'content' => $update['content'],
                    'type' => $update['type'] ?? 'text',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return response()->json(['message'=>'Content updated successfully!']);
    }

    // Image upload (drag & drop)
    // public function uploadImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|max:4096',
    //         'section' => 'required|string'
    //     ]);

    //     $path = $request->file('image')->store('uploads', 'public');
    //     $imgUrl = asset('storage/'.$path);

    //     $exists = DB::table('blade_contents')->where('section', $request->section)->exists();
    //     if($exists){
    //         DB::table('blade_contents')->where('section', $request->section)
    //             ->update(['content'=>$imgUrl, 'type'=>'image','updated_at'=>now()]);
    //     } else {
    //         DB::table('blade_contents')->insert([
    //             'section'=>$request->section,
    //             'content'=>$imgUrl,
    //             'type'=>'image',
    //             'created_at'=>now(),
    //             'updated_at'=>now()
    //         ]);
    //     }

    //     return response()->json(['url'=>$imgUrl]);
    // }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
            'section' => 'required|string'
        ]);

        // Get the uploaded file
        $image = $request->file('image');

        // Define a file name based on the current timestamp and original extension
        $fileName = time() . '.' . $image->getClientOriginalExtension();

        // Move the file directly to the public/images directory
        $image->move(public_path('images'), $fileName);

        // Save only the relative path in the database
        $relativePath = 'images/' . $fileName;

        // Check if the section exists in the database
        $exists = DB::table('blade_contents')->where('section', $request->section)->exists();
        if ($exists) {
            // Update the record if the section already exists
            DB::table('blade_contents')->where('section', $request->section)
                ->update(['content' => $relativePath, 'type' => 'image', 'updated_at' => now()]);
        } else {
            // Insert a new record if the section doesn't exist
            DB::table('blade_contents')->insert([
                'section' => $request->section,
                'content' => $relativePath,
                'type' => 'image',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response()->json(['url' => asset($relativePath)]);
    }

    public function registration(Request $request)
        {
            // Validate the incoming request data
            $validated = $request->validate([
                'phone_number' => 'required|regex:/^[0-9]{10}$/',
                'email' => 'required|email',
                'reference_code' => 'required|string|max:255',
                'aadhar_card_number' => 'required|numeric',
                'pan_card_number' => 'required|string|size:10',
                'address' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'pincode' => 'required|numeric|digits:6',
                'quota' => 'required|string',
                'size' => 'required|string',
                'terms_conditions' => 'required|accepted',
            ]);

            // Insert the data into your table (replace 'your_table_name' with the actual table name)
            DB::table('property_registration')->insert([
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'reference_code' => $validated['reference_code'],
                'aadhar_card_number' => $validated['aadhar_card_number'],
                'pan_card_number' => $validated['pan_card_number'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'pincode' => $validated['pincode'],
                'quota' => $validated['quota'],
                'size' => $validated['size'],
                'terms_conditions' => $validated['terms_conditions'],
                'created_at' => now(), // Automatically adds the timestamp
                'updated_at' => now(), // Automatically adds the timestamp
            ]);

            // Return a response, for example redirecting back or displaying a success message
            return redirect()->route('property.register')->with('success', 'Registration successful!');
        }
}
