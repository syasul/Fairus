<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;

            $query->where('message', 'like', '%' . $searchTerm . '%')
                ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%')
                ->orWhere('firstName', 'like', '%' . $searchTerm . '%')
                ->orWhere('lastName', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%');
        }

        $messages = $query->paginate(10);

        return view('admin.pesan', compact('messages'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Create the message
        Message::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'message' => $request->input('message'),
        ]);

        // Redirect to home page
        return redirect('/')->with('success', 'Message sent successfully!');
    }
}
