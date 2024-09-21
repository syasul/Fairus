<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Rumah;

class RumahController extends Controller
{
    public function index(Request $request): View
    {
        // Ambil query dari input (jika ada)
        $search = $request->input('search');

        // Query untuk mengambil semua rumah dengan perumahan yang terkait (eager loading)
        // Filter berdasarkan tipe rumah atau ID perumahan jika query pencarian ada
        $rumahs = Rumah::with('perumahan')
            ->when($search, function ($query, $search) {
                return $query->where('tipe_rumah', 'like', '%' . $search . '%')
                    ->orWhereHas('perumahan', function ($query) use ($search) {
                        $query->where('id', $search)
                            ->orWhere('nama_perumahan', 'like', '%' . $search . '%');
                    });
            })
            ->get();

        // Passing data rumahs ke view
        return view('admin.masterRumah', compact('rumahs', 'search'));
    }
}
