<?php

namespace App\Http\Controllers;
use App\Models\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(10); 
        return view('backend.modules.jobs.index', compact('jobs')); // Pass jobs data to the view
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $job = Job::findOrFail($id);
            $job->delete();

            return redirect()->route('dashboard.jobs')->with('success', 'Job deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete job. Please try again.');
        }
    }
}
