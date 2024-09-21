<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Perumahan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $query = Fasilitas::query();

        if ($request->has('search')) {
            $query->where('nama_fasilitas', 'like', '%' . $request->search . '%');
        }

        $fasilitas = $query->paginate(10);
        return view('admin.masterFasilitas', compact('fasilitas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'gambar_fasilitas' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_fasilitas' => 'required|string|max:255',
        ]);

        $gambarFasilitas = $request->file('gambar_fasilitas');
        $imageName = $gambarFasilitas->hashName();
        $gambarFasilitas->storeAs('public/Facility', $imageName);

        $fasilitas = Fasilitas::create([
            'gambar_fasilitas' => $imageName,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        $fasilitas->save();

        return redirect()->route('master-fasilitas.index')->with('success', 'Fasilitas created successfully.');
    }

    public function update(Request $request, $id_fasilitas)
    {
        $request->validate([
            'gambar_fasilitas' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'nama_fasilitas' => 'required|string|max:255',
        ]);

        $fasilitas = Fasilitas::findOrFail($id_fasilitas);

        if ($request->hasFile('gambar_fasilitas')) {
            // Upload new image
            $gambarFasilitas = $request->file('gambar_fasilitas');
            $imageName = $gambarFasilitas->hashName();
            $gambarFasilitas->storeAs('public/Facility', $imageName);

            // Delete old image
            Storage::delete('public/Facility/' . $fasilitas->gambar_fasilitas);

            // Update fasilitas with new image
            $fasilitas->update([
                'gambar_fasilitas' => $imageName,
                'nama_fasilitas' => $request->nama_fasilitas,
            ]);
        } else {
            // Update without changing the image
            $fasilitas->update([
                'nama_fasilitas' => $request->nama_fasilitas,
            ]);
        }

        return redirect()->route('master-fasilitas.index')->with('success', 'Fasilitas updated successfully.');
    }

    public function destroy($id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);

        // dd($fasilitas['id_fasilitas']);

        // Delete the image associated with the fasilitas

        // Detach the related 'perumahan' if it exists in the pivot table
        if ($fasilitas->perumahan()->exists()) {
            $fasilitas->perumahan()->detach();
        }

        // Delete the 'fasilitas'
        Fasilitas::where('id_fasilitas', $fasilitas['id_fasilitas'])->delete();

        if ($fasilitas->gambar_fasilitas) {
            Storage::delete('public/Facility/' . $fasilitas->gambar_fasilitas);
        }
        return redirect()->route('master-fasilitas.index')->with('success', 'Fasilitas deleted successfully.');
    }
}
