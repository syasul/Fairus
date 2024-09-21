<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    public function index(Request $request)
    {
        // Inisialisasi query untuk Perumahan
        $query = Perumahan::query();

        // Jika ada parameter search dari request, tambahkan pencarian berdasarkan nama_perumahan
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama_perumahan', 'like', '%' . $searchTerm . '%');
        }

        // Ambil data perumahan dari database (bisa ditambahkan pagination jika diperlukan)
        $perumahans = $query->get();
        $fasilitas = Fasilitas::all();

        // Return ke view dengan data perumahans dan fasilitas
        return view('admin.masterPerumahan', compact('perumahans', 'fasilitas'));
    }
    public function store(Request $request)
    {
        // Validasi data input
        $data = $request->validate([
            'nama_perumahan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'gambar_perumahan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_jumbotron' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_perumahan_sub_title' => 'required|string|max:255',
            'about_perumahan_content' => 'required|string',
            'about_perumahan_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alasan_perumahan_content' => 'required|string',
            'about_perumahan_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_perumahan_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fasilitas_perumahan_title' => 'required|string|max:255',
            'fasilitas' => 'array',
            'maps_perumahan_sub_title' => 'required|string|max:255',
            'maps_perumahan_content' => 'required|string',
            'maps_perumahan_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pembayaran_perumahan_title' => 'required|string|max:255',
            'pembayaran_perumahan_content' => 'required|string',
            'penghargaan_title' => 'required|string|max:255',
        ]);

        // Inisialisasi model Perumahan
        $perumahan = new Perumahan($data);

        // Proses upload gambar-gambar jika ada
        if ($request->hasFile('gambar_perumahan')) {
            $gambarPerumahan = $request->file('gambar_perumahan');
            $gambarPerumahanName = $gambarPerumahan->hashName();
            $gambarPerumahan->storeAs('public/Perumahan', $gambarPerumahanName);
            $perumahan->gambar_perumahan = $gambarPerumahanName;
        }

        if ($request->hasFile('gambar_jumbotron')) {
            $gambarJumbotron = $request->file('gambar_jumbotron');
            $gambarJumbotronName = $gambarJumbotron->hashName();
            $gambarJumbotron->storeAs('public/Perumahan', $gambarJumbotronName);
            $perumahan->gambar_jumbotron = $gambarJumbotronName;
        }

        if ($request->hasFile('about_perumahan_image')) {
            $aboutImage = $request->file('about_perumahan_image');
            $aboutImageName = $aboutImage->hashName();
            $aboutImage->storeAs('public/Perumahan', $aboutImageName);
            $perumahan->about_perumahan_image = $aboutImageName;
        }

        if ($request->hasFile('about_perumahan_image1')) {
            $aboutImage1 = $request->file('about_perumahan_image1');
            $aboutImage1Name = $aboutImage1->hashName();
            $aboutImage1->storeAs('public/Perumahan', $aboutImage1Name);
            $perumahan->about_perumahan_image1 = $aboutImage1Name;
        }

        if ($request->hasFile('about_perumahan_image2')) {
            $aboutImage2 = $request->file('about_perumahan_image2');
            $aboutImage2Name = $aboutImage2->hashName();
            $aboutImage2->storeAs('public/Perumahan', $aboutImage2Name);
            $perumahan->about_perumahan_image2 = $aboutImage2Name;
        }

        if ($request->hasFile('maps_perumahan_image')) {
            $mapsImage = $request->file('maps_perumahan_image');
            $mapsImageName = $mapsImage->hashName();
            $mapsImage->storeAs('public/Perumahan', $mapsImageName);
            $perumahan->maps_perumahan_image = $mapsImageName;
        }

        // Simpan data perumahan ke database
        $perumahan->save();

        // Sinkronisasi fasilitas jika ada
        if ($request->has('fasilitas')) {
            $perumahan->fasilitas()->sync($request->fasilitas);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Perumahan berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $perumahan = Perumahan::findOrFail($id);
        $data = $request->validate([
            'nama_perumahan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'gambar_perumahan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_jumbotron' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_perumahan_sub_title' => 'required|string|max:255',
            'about_perumahan_content' => 'required|string',
            'about_perumahan_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alasan_perumahan_content' => 'required|string',
            'about_perumahan_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_perumahan_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fasilitas_perumahan_title' => 'required|string|max:255',
            'maps_perumahan_sub_title' => 'required|string|max:255',
            'maps_perumahan_content' => 'required|string',
            'maps_perumahan_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pembayaran_perumahan_title' => 'required|string|max:255',
            'pembayaran_perumahan_content' => 'required|string',
            'penghargaan_title' => 'required|string|max:255',
        ]);

        $perumahan->update($data);

        // Handle optional image uploads
        $this->handleImageUploads($request, $perumahan);

        // Update associated facilities
        if ($request->has('fasilitas')) {
            $perumahan->fasilitas()->sync($request->fasilitas);
        }

        return redirect()->back()->with('success', 'Data Perumahan berhasil diupdate');
    }

    public function destroy($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        $perumahan->delete();

        return redirect()->back()->with('success', 'Data Perumahan berhasil dihapus');
    }

    private function handleImageUploads(Request $request, Perumahan $perumahan)
    {
        $images = ['gambar_perumahan', 'gambar_jumbotron', 'about_perumahan_image', 'about_perumahan_image1', 'about_perumahan_image2', 'maps_perumahan_image'];

        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $perumahan->$image = $request->file($image)->store('Perumahan', 'public');
            }
        }
    }
}
