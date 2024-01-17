<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobCategories = JobCategory::all();
        $jobCategories = DB::table('job_category')
        ->select('*')
        ->orderBy('id', 'DESC')  
        ->paginate(3);

        return view('backend.modules.jobs.jobCategory', compact('jobCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_types' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        try {
            // Create a new JobCategory instance with the validated data
            JobCategory::create($validatedData);

            return redirect()->route('dashboard.jobcategory.index')->with('success', 'Job category created successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the creation process
            return back()->with('error', 'Failed to create job category. Please try again. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // for requested category data
        $jobCatSingle = DB::table('job_category')
        ->select('*')
        ->where('job_category.id', $id)
        ->first();
        // for showing al rategory data
        $jobCategories = DB::table('job_category')
        ->select('*')
        ->orderBy('id', 'DESC')  
        ->paginate(3);


        return view('backend.modules.jobs.jobCategory', compact('jobCatSingle', 'jobCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobCategory $jobCatSingle)
    {
        dd($jobCatSingle);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_types' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        try {
            // Find the existing JobCategory instance
            $jobCategory = JobCategory::findOrFail($id);

            // Update the attributes with the validated data
            $jobCategory->update($validatedData);

            return redirect()->route('dashboard.jobcategory.index')->with('success', 'Job category updated successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update process
            return back()->with('error', 'Failed to update job category. Please try again. ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = JobCategory::findOrFail($id);
            $category->delete();
    
            return redirect()->route('dashboard.jobcategory.index')->with('success', 'Job category deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete job category. Please try again. ' . $e->getMessage());
        }
    }
}
