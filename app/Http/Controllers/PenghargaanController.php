<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghargaan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PenghargaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penghargaan::query();

        if ($request->has('search')) {
            $query->where('nameAchivement', 'like', '%' . $request->search . '%');
        }

        $penghargaans = $query->paginate(10);
        return view('admin.masterPenghargaan', compact('penghargaans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'imageAchivement' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nameAchivement' => 'required|string|max:255',
        ]);

        $imageAchivement = $request->file('imageAchivement');
        $imageName = $imageAchivement->hashName();
        $imageAchivement->storeAs('public/Achivement', $imageName);

        Penghargaan::create([
            'imageAchivement' => $imageName,
            'nameAchivement' => $request->nameAchivement,
        ]);

        return redirect()->route('master-penghargaan.index')->with('success', 'Penghargaan created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'imageAchivement' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'nameAchivement' => 'required|string|max:255',
        ]);

        $penghargaan = Penghargaan::findOrFail($id);

        if ($request->hasFile('imageAchivement')) {
            // Upload new image
            $imageAchivement = $request->file('imageAchivement');
            $imageName = $imageAchivement->hashName();
            $imageAchivement->storeAs('public/Achivement', $imageName);

            // Delete old image
            Storage::delete('public/Achivement/' . $penghargaan->imageAchivement);

            // Update penghargaan with new image
            $penghargaan->update([
                'imageAchivement' => $imageName,
                'nameAchivement' => $request->nameAchivement,
            ]);
        } else {
            // Update without changing the image
            $penghargaan->update([
                'nameAchivement' => $request->nameAchivement,
            ]);
        }

        return redirect()->route('master-penghargaan.index')->with('success', 'Penghargaan updated successfully.');
    }

    public function destroy($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);

        // Delete image
        Storage::delete('public/Achivement/' . $penghargaan->imageAchivement);

        // Delete penghargaan
        $penghargaan->delete();

        return redirect()->route('master-penghargaan.index')->with('success', 'Penghargaan deleted successfully.');
    }
}
