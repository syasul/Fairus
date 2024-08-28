<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeSection = Sales::where('name', 'home')->first();
        $aboutMeSection = Sales::where('name', 'aboutMeSection')->first();

        return view('client.home', compact('homeSection', 'aboutMeSection'));
    }
}
