{{-- @dd($job); --}}
       <!-- including the app (header & footer) -->
        @extends('frontend.layouts.app')

        <!-- Main Home Page Body -->
        @section('content')
        {{-- job Post Area --}}
         <!-- Job Detail Start -->
         <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ $job->company_logo }}" alt="" style="width: 100px; height: 100px;">
                            <div class="text-start ps-4">
                                <h4 class="text-warning"><a href="#">{{ $job->company_name }}</a></h4>
                                <h3 class="mb-3">{{ $job->title }}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->type }}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}৳</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3 text-success">Job description</h4>
                            <div class="border p-3">
                                {{-- ck editor job description showing using htmlspecialchar_decode --}}
                                {!! htmlspecialchars_decode($job->description) !!}
                            </div>
                        </div>
        
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control bg-white">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        {{-- Exclusive Fileds --}}
                        <div class="bg-light rounded p-3 mb-1 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Inclusive Info</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Accessibility :</b> {{ $job->accessibility_needs }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Strengths & Skills:</b> {{ $job->strengths_and_skills }} </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Accommodations:</b> {{ $job->suggested_accommodations }} </p>
                        </div>
                        {{-- Job Summery --}}
                        <div class="bg-light rounded p-3 mb-1 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            {{-- <p><i class="fa fa-angle-right text-primary me-2"></i><b>Published On:</b> {{ $job->created_at->format('d M, Y') }}</p> --}}
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Company:</b> <a href="#">{{ $job->company_name }}</a> </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Experience:</b> {{ $job->experience_level }} </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Education:</b> {{ $job->education_level }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Vacancy:</b> {{ $job->vacancy }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Category:</b> <a href="#">{{ $job->category_name }}</a></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Benefits:</b> {{ $job->benefits }}</p>
                            {{-- Custom Date Field: If deadline is a custom date field (e.g., string), you might need to parse it into a Carbon instance before formatting: --}}
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i><b>Date Line:</b> {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</p>
                        </div>
                        {{-- About Company --}}
                        <div class="bg-light rounded p-3 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">{{ $job->company_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->
        @endsection