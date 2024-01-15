{{-- @dd($job) --}}
<!-- including the app (header & footer) -->
@extends('backend.layouts.app')

<!-- Main Home Page Body -->
@section('content')    

<!-- main page body content -->
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Job In Details</li>
            </ol>
            <div class="row"> 
            
                {{-- ###########JobDetails############# --}}
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Job Title</th>
                            <td>{{ $job->title }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ $job->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $job->category_name }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $job->location }}</td>
                        </tr>
                        <tr>
                            <th>Vacancies</th>
                            <td>{{ $job->vacancy }}</td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>{{ $job->salary }}</td>
                        </tr>
                        <tr>
                            <th>Job Type</th>
                            <td>{{ $job->type }}</td>
                        </tr>
                        <tr>
                            <th>Experience Level</th>
                            <td>{{ $job->experience_level }}</td>
                        </tr>
                        <tr>
                            <th>Required Skills</th>
                            <td>{{ $job->skills }}</td>
                        </tr>
                        <tr>
                            <th>Education Level</th>
                            <td>{{ $job->education_level }}</td>
                        </tr>
                        <tr>
                            <th>Benefits</th>
                            <td>{{ $job->benefits }}</td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <td>{{ $job->deadline }}</td>
                        </tr>
                        <tr>
                            <th>Accessibility Needs</th>
                            <td>{{ $job->accessibility_needs }}</td>
                        </tr>
                        <tr>
                            <th>Strengths and Skills</th>
                            <td>{{ $job->strengths_and_skills }}</td>
                        </tr>
                        <tr>
                            <th>Suggested Accommodations</th>
                            <td>{{ $job->suggested_accommodations }}</td>
                        </tr>
                        <tr>
                            <th>Job Description</th>
                            <td>{!! $job->description !!}</td> </tr>
                    </tbody>
                </table>
                

            </div>
            {{-- row end --}}
        </div>
        {{-- end of counterner --}}
    </main>
@endsection
             