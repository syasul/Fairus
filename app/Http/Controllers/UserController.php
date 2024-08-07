<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('admin.masterUser', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        User::create($request->all());

        return redirect()->route('master-user.index');
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $user->update($request->only(['username', 'password'])); // Use only() to update specific fields

        return redirect()->route('master-user.index');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('master-user.index');
    }
}
