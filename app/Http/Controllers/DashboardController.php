<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {

        return view('admin.dashboard');
    }

    public function update(Request $request, $section)
    {
        // Find the section by name or create a new one if it doesn't exist
        $sectionContent = Sales::firstOrNew(['name' => $section]);

        // Update the section's content
        $sectionContent->content = $request->input('content');
        $sectionContent->subcontent = $request->input('subcontent');
        $sectionContent->description = $request->input('description');

        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/sales');
            $sectionContent->image_path = $imagePath;
        }

        // Save the changes to the database
        $sectionContent->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Section updated successfully!');
    }
}
