<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\View\View;


class BackendController extends Controller
{
    public function index()
    {
        return view('backend.pages.index');
    }

    public function test()
    {
        return view('backend.pages.test');
    }
}

