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
        $sliders = DB::table('sliders')->get();  
        return view('frontend.pages.index', compact('sliders'));
    }

    // single jobs 
    public function single($id)
    {
        // // Fetch the job based on the slug
        // $job = Job::where('id', $id)->firstOrFail();

        // // Return the single job view
        // return view('frontend.pages.job_details', compact('job'));

        // // HomeController
        // $job = Job::with(['company', 'category'])->where('id', $id)->firstOrFail();

        // // Pass the job to the view
        // return view('frontend.pages.job_details', compact('job'));

        // Fetch job with related company and category data
        $job = DB::table('jobs')
        ->select('jobs.*', 'company.name as company_name', 'company.description as company_description', 'company.picture as company_logo', 'job_category.category_types as category_name')
        ->leftJoin('company', 'jobs.company_id', '=', 'company.id')
        ->leftJoin('job_category', 'jobs.category_id', '=', 'job_category.id')
        ->where('jobs.id', $id)
        ->first();

        // Pass the job data to the view
        return view('frontend.pages.job_details', compact('job'));


    }

}
 