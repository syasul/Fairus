<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $perumahans = $query->paginate(10);
        $fasilitas = Fasilitas::all();

        // Return ke view dengan data perumahans dan fasilitas
        return view('admin.masterPerumahan', compact('perumahans', 'fasilitas'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
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
            'fasilitas' => 'nullable|array',
            'fasilitas.*' => 'exists:fasilitas,id_fasilitas',
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


        $perumahan->fasilitas()->sync($request->fasilitas);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Perumahan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Temukan perumahan berdasarkan ID
        $perumahan = Perumahan::findOrFail($id);

        // Validasi input
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

        // Update perumahan dengan data yang divalidasi
        $perumahan->update($data);

        // Handle optional image uploads (fungsi baru yang akan ditambahkan)
        $this->handleImageUploads($request, $perumahan);

        // Sinkronisasi fasilitas perumahan
        $perumahan->fasilitas()->sync($request->fasilitas);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Perumahan berhasil diupdate');
    }

    public function handleImageUploads(Request $request, $perumahan)
    {
        // Gambar Perumahan
        if ($request->hasFile('gambar_perumahan')) {
            // Hapus gambar lama jika ada
            if ($perumahan->gambar_perumahan && Storage::exists('public/Perumahan/' . $perumahan->gambar_perumahan)) {
                Storage::delete('public/Perumahan/' . $perumahan->gambar_perumahan);
            }
            // Simpan gambar baru
            $fileName = time() . '_' . $request->file('gambar_perumahan')->getClientOriginalName();
            $request->file('gambar_perumahan')->storeAs('public/Perumahan', $fileName);
            $perumahan->gambar_perumahan = $fileName;
        }

        // Gambar Jumbotron
        if ($request->hasFile('gambar_jumbotron')) {
            if ($perumahan->gambar_jumbotron && Storage::exists('public/Perumahan/' . $perumahan->gambar_jumbotron)) {
                Storage::delete('public/Perumahan/' . $perumahan->gambar_jumbotron);
            }
            $fileName = time() . '_' . $request->file('gambar_jumbotron')->getClientOriginalName();
            $request->file('gambar_jumbotron')->storeAs('public/Perumahan', $fileName);
            $perumahan->gambar_jumbotron = $fileName;
        }

        // Gambar About Perumahan
        if ($request->hasFile('about_perumahan_image')) {
            if ($perumahan->about_perumahan_image && Storage::exists('public/Perumahan/' . $perumahan->about_perumahan_image)) {
                Storage::delete('public/Perumahan/' . $perumahan->about_perumahan_image);
            }
            $fileName = time() . '_' . $request->file('about_perumahan_image')->getClientOriginalName();
            $request->file('about_perumahan_image')->storeAs('public/Perumahan', $fileName);
            $perumahan->about_perumahan_image = $fileName;
        }

        // Gambar About Perumahan 1
        if ($request->hasFile('about_perumahan_image1')) {
            if ($perumahan->about_perumahan_image1 && Storage::exists('public/Perumahan/' . $perumahan->about_perumahan_image1)) {
                Storage::delete('public/Perumahan/' . $perumahan->about_perumahan_image1);
            }
            $fileName = time() . '_' . $request->file('about_perumahan_image1')->getClientOriginalName();
            $request->file('about_perumahan_image1')->storeAs('public/Perumahan', $fileName);
            $perumahan->about_perumahan_image1 = $fileName;
        }

        // Gambar About Perumahan 2
        if ($request->hasFile('about_perumahan_image2')) {
            if ($perumahan->about_perumahan_image2 && Storage::exists('public/Perumahan/' . $perumahan->about_perumahan_image2)) {
                Storage::delete('public/Perumahan/' . $perumahan->about_perumahan_image2);
            }
            $fileName = time() . '_' . $request->file('about_perumahan_image2')->getClientOriginalName();
            $request->file('about_perumahan_image2')->storeAs('public/Perumahan', $fileName);
            $perumahan->about_perumahan_image2 = $fileName;
        }

        // Gambar Maps Perumahan
        if ($request->hasFile('maps_perumahan_image')) {
            if ($perumahan->maps_perumahan_image && Storage::exists('public/Perumahan/' . $perumahan->maps_perumahan_image)) {
                Storage::delete('public/Perumahan/' . $perumahan->maps_perumahan_image);
            }
            $fileName = time() . '_' . $request->file('maps_perumahan_image')->getClientOriginalName();
            $request->file('maps_perumahan_image')->storeAs('public/Perumahan', $fileName);
            $perumahan->maps_perumahan_image = $fileName;
        }

        // Simpan perumahan dengan update gambar
        $perumahan->save();
    }


    public function destroy($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        $perumahan->delete();

        return redirect()->back()->with('success', 'Data Perumahan berhasil dihapus');
    }
}
