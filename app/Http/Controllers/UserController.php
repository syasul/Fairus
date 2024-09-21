<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Inisialisasi query untuk User
        $query = User::query();

        // Jika ada parameter search dari request, tambahkan pencarian berdasarkan username
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('username', 'like', '%' . $searchTerm . '%');
        }

        // Paginate data user dan hanya ambil username
        $users = $query->paginate(10);

        // Kembalikan view dengan data user yang sudah difilter
        return view('admin.masterUser', compact('users'));
    }

    public function store(Request $request)
    {

        $save = User::create([
            'username' => $request->username,
            'text_password' => $request->password,
            'password' => bcrypt($request->password),
        ]);



        $save->save();

        return redirect()->route('master-user.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->username = $request->input('username');

        // Jika password (plaintext) diubah, simpan plaintext dan hash untuk password
        if ($request->input('text_password')) {
            $user->text_password = $request->input('text_password');
            $user->password = Hash::make($request->input('text_password'));
        }

        $user->save();

        return redirect()->route('master-user.index')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('master-user.index')->with('success', 'User deleted successfully');
    }
}
