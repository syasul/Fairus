<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Perumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('perumahan')->paginate(10);
        $perumahans = Perumahan::all();
        return view('admin.masterVideo', compact('videos', 'perumahans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_perumahan' => 'required|exists:perumahan,id_perumahan', // Pastikan ID Perumahan ada
            'video' => 'required|file|mimes:mp4,mov,avi|max:50000',    // Validasi file video
        ]);

        // Cek apakah perumahan sudah memiliki video
        $existingVideo = Video::where('id_perumahan', $request->id_perumahan)->first();

        if ($existingVideo) {
            return redirect()->back()->with('danger', 'Perumahan ini sudah memiliki video.');
        } else {
            // Proses upload video jika belum ada
            $videoPerumahan = $request->file('video');
            $videoName = $videoPerumahan->hashName(); // Generate nama unik untuk video
            $videoPerumahan->storeAs('public/Video', $videoName); // Simpan video ke storage

            // Simpan data video ke database
            $video = Video::create([
                'id_perumahan' => $request->id_perumahan,
                'video' => $videoName,
            ]);

            $video->save();

            // Redirect dengan pesan sukses
            return redirect()->route('master-video.index')->with('success', 'Video berhasil ditambahkan.');
        }
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'id_perumahan' => 'required',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:50000',
        ]);

        $video = Video::findOrFail($id);

        if ($request->hasFile('video')) {
            $videoPerumahan = $request->file('video');
            $videoName = $videoPerumahan->hashName();
            $videoPerumahan->storeAs('public/Video', $videoName);

            Storage::delete('public/Video/' . $video->video);

            $video->update([
                'id_perumahan' => $request->id_perumahan,
                'video' => $videoName,
            ]);
        } else {
            $video->update([
                'id_perumahan' => $request->id_perumahan,
            ]);
        }


        return redirect()->route('master-video.index')->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('master-video.index')->with('success', 'Video deleted successfully.');
    }
}
