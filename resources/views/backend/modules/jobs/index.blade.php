            <!-- including the app (header & footer) -->
            @extends('backend.layouts.app')

            <!-- Main Home Page Body -->
            @section('content')    

            <!-- main page body content -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">All Jobs</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">11 Jobs Found</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Company</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->company->name ?? 'N/A' }}</td> 
                                            <td>{{ $job->category->name ?? 'N/A' }}</td> 
                                            <td>{{ $job->location }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div>
                        </div>
                    </div>
                </main>
            @endsection
            <!-- footer -->