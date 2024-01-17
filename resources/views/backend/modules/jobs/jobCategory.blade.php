{{-- @dd($jobCatSingle) --}}
{{-- 
+"id": 5
+"name": "NGO"
+"description": "Description for Accounting & Finance"
+"category_types": "Finance"
+"icon": "https://example.com/icon5.png"
+"created_at": null
+"updated_at": null --}}
<!-- including the app (header & footer) -->
@extends('backend.layouts.app')

<!-- Main Home Page Body -->
@section('content')    

<!-- main page body content -->
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">All Category</li>
            </ol>
            <div class="row">
               {{-- Job categories CRUD --}}
               <div class="row">
                    {{-- job create form --}}
                    <div class="col-md-6 ">
                       <div class="">
                            <h6>Create Job Category</h6>
                            <a href="{{ route('dashboard.jobcategory.index') }}">Create New</a>
                       </div>
                        {{-- <form class=" text-light bg-dark p-3" action="{{ route('dashboard.jobcategory.store') }}" method="POST"> --}}
                        <form action="{{ isset($jobCatSingle) ? route('dashboard.jobcategory.update', $jobCatSingle->id) : route('dashboard.jobcategory.store') }}" method="{{ isset($jobCatSingle) ? 'PUT' : 'POST' }}">
                                @csrf
                                

                            {{-- isset($jobCatSingle) checks whether the variable $jobCatSingle exists. If it exists, it means you are editing an existing entry, and the input field will be populated with the existing data ($jobCatSingle->name). If it doesn't exist, the value will be an empty string, which is suitable for creating a new entry. --}}
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" value="{{ isset($jobCatSingle) ? $jobCatSingle->name : '' }}" name="name">
                            </div>                            
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description">{{ isset($jobCatSingle) ? $jobCatSingle->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_types">Category Types:</label>
                                <input type="text" class="form-control" id="category_types" name="category_types" value="{{ isset($jobCatSingle) ? $jobCatSingle->category_types : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon (optional):</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ isset($jobCatSingle) ? $jobCatSingle->icon : '' }}">
                            </div>
                            {{-- <button type="submit" class="btn btn-primary mt-3">Create</button> --}}
                            <button type="submit" class="btn btn-primary mt-3">{{ isset($jobCatSingle) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                    
                    {{-- job showing form --}}
                    <div class="col-md-6">
                        {{-- massage --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h6>Job Categories</h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobCategories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.jobcategory.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('dashboard.jobcategory.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- pagignate --}}
                         <!-- {{-- pagignate pages --}} -->
                         <div class="col-xl-3 col-md-12 pagination p-5 mt-3 d-flex justify-content-center">
                            <ul class="pagination-container">
                                {{ $jobCategories->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>

                    </div>

                </div>
            
            </div>
        </div>
    </main>
@endsection