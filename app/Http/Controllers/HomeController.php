<?php

namespace App\Http\Controllers;
use App\Models\Job;

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

    // single jobs 
    public function single($id)
    {
        // Fetch the job based on the slug
        $job = Job::where('id', $id)->firstOrFail();

        // Return the single job view
        return view('frontend.pages.job_details', compact('job'));
    }

}
 