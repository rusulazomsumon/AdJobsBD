<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = DB::table('sliders')->get(); // Use the DB facade
        return view('frontend.pages.index', compact('sliders'));
    }
}
