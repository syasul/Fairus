<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use App\Models\Fasilitas;
use App\Models\FotoPembelian;
use App\Models\Penghargaan;
use App\Models\Rumah;
use App\Models\Sales;
use App\Models\Video;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeSection = Sales::where('name', 'home')->first();
        $aboutMeSection = Sales::where('name', 'aboutMe')->first();
        $perumahans = Perumahan::all();

        return view('client.home', compact('homeSection', 'aboutMeSection', 'perumahans'));
    }

    public function show($id_perumahan): View
    {
        // Mengambil data perumahan berdasarkan ID
        $perumahans = Perumahan::findOrFail($id_perumahan);

        $video = Video::where('id_perumahan', $id_perumahan)->first();

        $fasilitas = $perumahans->fasilitas;
        $rumahs = $perumahans->rumah;
        $penghargaans = Penghargaan::all();
        $fotoPembelians = FotoPembelian::all();

        // Memecah teks alasan_perumahan_content menjadi array berdasarkan baris baru
        $alasanContent = explode("\n", $perumahans->alasan_perumahan_content);
        $mapsContent = explode("\n", $perumahans->maps_perumahan_content);
        $pembayaranContent = explode("\n", $perumahans->pembayaran_perumahan_content);

        // Membagi array menjadi dua bagian untuk alasan_perumahan_content
        $halfIndexAlasan = ceil(count($alasanContent) / 2);
        $firstHalfAlasan = array_slice($alasanContent, 0, $halfIndexAlasan);
        $secondHalfAlasan = array_slice($alasanContent, $halfIndexAlasan);

        // Membagi array menjadi dua bagian untuk maps_perumahan_content
        $halfIndexMaps = ceil(count($mapsContent) / 2);
        $firstHalfMaps = array_slice($mapsContent, 0, $halfIndexMaps);
        $secondHalfMaps = array_slice($mapsContent, $halfIndexMaps);

        // Membagi array menjadi tiga bagian untuk pembayaran_perumahan_content
        $thirdIndexPembayaran = ceil(count($pembayaranContent) / 3);
        $firstPembayaran = array_slice($pembayaranContent, 0, $thirdIndexPembayaran);
        $secondPembayaran = array_slice($pembayaranContent, $thirdIndexPembayaran, $thirdIndexPembayaran);
        $thirdPembayaran = array_slice($pembayaranContent, $thirdIndexPembayaran * 2);

        // Mengirim data ke view
        return view('client.detail', compact('perumahans', 'firstHalfAlasan', 'secondHalfAlasan', 'firstHalfMaps', 'secondHalfMaps', 'firstPembayaran', 'secondPembayaran', 'thirdPembayaran', 'fasilitas', 'penghargaans', 'fotoPembelians', 'rumahs', 'video'));
    }
}
