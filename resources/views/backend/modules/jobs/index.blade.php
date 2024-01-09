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
                            <div class="col-xl-12 col-md-12">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total {{ $jobs->total() }} Jobs Found</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"> Add New Job </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- job table -->
                            <div class="col-xl-3 col-md-12">
                                <!-- massage box -->
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <!-- all job table -->
                                <table>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="p-3">Title</th>
                                            <th class="p-3">Company</th>
                                            <th class="p-3">Category</th>
                                            <th class="p-3">Location</th>
                                            <th class="p-3">Edit</th>
                                            <th class="p-3">Delete</th>
                                            <th class="p-3">View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td class="p-3">{{ $job->title }}</td>
                                            <td class="p-3">{{ $job->company->name ?? 'N/A' }}</td>
                                            <td class="p-3">{{ $job->category->name ?? 'N/A' }}</td>
                                            <td class="p-3">{{ $job->location }}</td>
                                            <td class="p-3">
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                            <td class="p-3">
                                                <form action="{{ route('dashboard.jobs.destroy', $job->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger">Delete</button>     
                                                </form>
                                            </td>
                                            <td class="p-3">      
                                                <a href="#" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div>
                            <!-- {{-- pagignate pages --}} -->
                            <div class="col-xl-3 col-md-12 pagination mt-3 d-flex justify-content-center">
                                <ul class="pagination-container">
                                    {{ $jobs->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>

                        </div>
                    </div>
                </main>
            @endsection
            <!-- footer -->