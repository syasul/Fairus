<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Storage;

class RumahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $perumahans = Perumahan::all();

        $rumahs = Rumah::with('perumahan')
            ->when($search, function ($query, $search) {
                return $query->where('tipe_rumah', 'like', '%' . $search . '%')
                    ->orWhereHas('perumahan', function ($query) use ($search) {
                        $query->where('nama_perumahan', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(10);

        return view('admin.masterRumah', compact('rumahs', 'perumahans'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'gambar_rumah' => 'required|image',
            'tipe' => 'required|string|max:255',
            'id_perumahan' => 'required|exists:perumahan,id_perumahan',
            'deskripsi' => 'required|string',
        ]);

        $gambarRumah = $request->file('gambar_rumah');
        $imageName = $gambarRumah->hashName();
        $gambarRumah->storeAs('public/Home', $imageName);


        Rumah::create([
            'gambar_rumah' => $imageName,
            'tipe' => $request->tipe,
            'id_perumahan' => $request->id_perumahan,  // Use id_perumahan here
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('master-rumah.index')->with('success', 'Rumah added successfully!');
    }

    public function update(Request $request, $id_rumah)
    {
        $request->validate([
            'gambar_rumah' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tipe' => 'required|string|max:255',
            'id_perumahan' => 'required|exists:perumahan,id_perumahan',
            'deskripsi' => 'required|string',
        ]);

        $rumah = Rumah::findOrFail($id_rumah);

        if ($request->hasFile('gambar_rumah')) {
            // Upload new image
            $gambarRumah = $request->file('gambar_rumah');
            $imageName = $gambarRumah->hashName();
            $gambarRumah->storeAs('public/Home', $imageName);

            // Delete old image
            Storage::delete('public/Home/' . $rumah->gambar_rumah);

            // Update rumah with new image
            $rumah->update([
                'gambar_rumah' => $imageName,
                'tipe' => $request->tipe,
                'id_perumahan' => $request->id_perumahan,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Update without changing the image
            $rumah->update([
                'tipe' => $request->tipe,
                'id_perumahan' => $request->id_perumahan,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('master-rumah.index')->with('success', 'Rumah updated successfully!');
    }



    public function destroy($id_rumah)
    {
        $rumah = Rumah::findOrFail($id_rumah);

        // Delete image from storage
        Storage::delete('public/Home/' . $rumah->gambar_rumah);

        // Delete the rumah record
        $rumah->delete();

        return redirect()->route('master-rumah.index')->with('success', 'Rumah deleted successfully.');
    }
}
