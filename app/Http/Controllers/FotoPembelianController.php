<?php

namespace App\Http\Controllers;

use App\Models\FotoPembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FotoPembelianController extends Controller
{
    public function index(): View
    {
        $pembelians = FotoPembelian::paginate(10);
        return view('admin.MasterFotoPembelian', compact('pembelians'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'foto_pembelian' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $fotoPembelian = $request->file('foto_pembelian');
        $imageName = $fotoPembelian->hashName();
        $fotoPembelian->storeAs('public/Payment/', $imageName);

        $pembelian = FotoPembelian::create([
            'foto_pembelian' => $imageName,
        ]);

        $pembelian->save();

        return redirect()->route('master-foto-pembelian.index')->with('success', 'Foto Pembayaran created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_pembelian' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $pembelian = FotoPembelian::findOrFail($id);

        if ($request->hasFile('foto_pembelian')) {
            $fotoPembelian = $request->file('foto_pembelian');
            $imageName = $fotoPembelian->hashName();
            $fotoPembelian->storeAs('public/Payment/', $imageName);

            Storage::delete('public/Payment/' . $pembelian->foto_pembelian);

            $pembelian->update([
                'foto_pembelian' => $imageName,
            ]);
        }

        return redirect()->route('master-foto-pembelian.index')->with('success', 'Foto Pembayaran updated successfully');
    }

    public function destroy($id)
    {
        $pembelian = FotoPembelian::findOrFail($id);
        Storage::delete('public/Payment/' . $pembelian->foto_pembelian);
        $pembelian->delete();
        return redirect()->route('master-foto-pembelian.index')->with('success', 'Foto Pembayaran deleted successfully');
    }
}
