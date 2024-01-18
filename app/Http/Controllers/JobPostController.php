<?php

namespace App\Http\Controllers;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\JobCategory;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // sending using mode, ORM
        // $jobs = Job::latest()->paginate(10); 
        // return view('backend.modules.jobs.index', compact('jobs'));  

        // sending menually 
        // Fetch job with related company and category data
        $jobs = DB::table('jobs')
            ->select('jobs.*', 'company.name as company_name', 'company.description as company_description', 'company.picture as company_logo', 'job_category.category_types as category_name')
            ->leftJoin('company', 'jobs.company_id', '=', 'company.id')
            ->leftJoin('job_category', 'jobs.category_id', '=', 'job_category.id')
            ->orderBy('jobs.id', 'DESC')
            ->paginate(10);  


        // Pass the job data to the view
        return view('backend.modules.jobs.index', compact('jobs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Retrieve all companies and categories for dropdowns
        $companies = DB::table('company')->select('id', 'name')->get();
        $categories = DB::table('job_category')->select('id', 'category_types as name')->get();

        return view('backend.modules.jobs.create', compact('companies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data using the Job model
        $validator = JobPost::validate($request->all());

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('dashboard.jobs.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new job instance and save it to the database
        JobPost::create($request->all());

        // Redirect to a success page or back to the form with a success message
        return redirect()->route('dashboard.jobs.create')->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch job with related company and category data
        $job = DB::table('jobs')
        ->select('jobs.*', 'company.name as company_name', 'company.description as company_description', 'company.picture as company_logo', 'job_category.category_types as category_name')
        ->leftJoin('company', 'jobs.company_id', '=', 'company.id')
        ->leftJoin('job_category', 'jobs.category_id', '=', 'job_category.id')
        ->where('jobs.id', $id)
        ->first();


        // Pass the job data to the view
        return view('backend.modules.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = DB::table('jobs')
        ->select('jobs.*', 'company.name as company_name', 'job_category.category_types as category_name')
        ->leftJoin('company', 'jobs.company_id', '=', 'company.id')
        ->leftJoin('job_category', 'jobs.category_id', '=', 'job_category.id')
        ->where('jobs.id', $id)
        ->first();

        // Retrieve all companies and categories for dropdowns
        $companies = DB::table('company')->select('id', 'name')->get();
        $categories = DB::table('job_category')->select('id', 'category_types as name')->get();

        return view('backend.modules.jobs.edit', compact('job','companies', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data using the Job model
        $validator = JobPost::validate($request->all());

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('dashboard.jobs.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Find the job instance by ID
            $jobPost = JobPost::findOrFail($id);

            // Update the job instance with the new data
            $jobPost->update($request->all());

            // Redirect to a success page or back to the form with a success message
            return redirect()->route('dashboard.jobs.edit', $id)->with('success', 'Job updated successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update process
            return back()->with('error', 'Failed to update job. Please try again. ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jobPost = JobPost::findOrFail($id);
            $jobPost->delete();

            return redirect()->route('dashboard.jobs')->with('success', 'Job deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete job. Please try again.');
        }
    }
}
