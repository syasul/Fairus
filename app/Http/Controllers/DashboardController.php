<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Message;
use App\Models\Penghargaan;
use App\Models\Perumahan;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $homeSection = Sales::where('name', 'home')->first();
        $aboutMeSection = Sales::where('name', 'aboutMe')->first();

        $perumahanCount = Perumahan::count();
        $fasilitasCount = Fasilitas::count();
        $penghargaanCount = Penghargaan::count();
        $pesanCount = Message::count();

        return view('admin.dashboard', compact('homeSection', 'aboutMeSection', 'perumahanCount', 'fasilitasCount', 'penghargaanCount', 'pesanCount'));
    }

    public function update(Request $request, $section)
    {
        // Validasi section
        if (!in_array($section, ['home', 'aboutMe'])) {
            return redirect()->back()->with('alert', 'Invalid section.');
        }

        // Validasi request data
        $validatedData = $request->validate([
            'content' => 'nullable|string',
            'subcontent' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan atau buat baru section
        $sectionContent = Sales::firstOrNew(['name' => $section]);

        // Update content
        $sectionContent->content = $validatedData['content'] ?? $sectionContent->content;
        $sectionContent->subcontent = $validatedData['subcontent'] ?? $sectionContent->subcontent;
        $sectionContent->description = $validatedData['description'] ?? $sectionContent->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($sectionContent->image_path && Storage::exists('public/' . $sectionContent->image_path)) {
                Storage::delete('public/' . $sectionContent->image_path);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/Sales', $imageName);

            // Simpan path gambar ke database
            $sectionContent->image_path = 'Sales/' . $imageName;
        }

        // Simpan perubahan ke database
        $sectionContent->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Section updated successfully!');
    }
}
