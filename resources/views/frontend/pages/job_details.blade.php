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
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ $job->title }}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->type }}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}৳</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>{{ $job->description }}</p>
                            <h4 class="mb-3">Responsibility</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                            <h4 class="mb-3">Qualifications</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
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
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Published On:</b> {{ $job->created_at->format('d M, Y') }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Company:</b> <a href="#">ABC IT Ltd.</a> </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Experience:</b> {{ $job->experience_level }} </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Education:</b> {{ $job->education_level }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Vacancy:</b> {{ $job->vacancy }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Category:</b> <a href="#">IT Skill</a></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i><b>Benefits:</b> {{ $job->benefits }}</p>
                            {{-- Custom Date Field: If deadline is a custom date field (e.g., string), you might need to parse it into a Carbon instance before formatting: --}}
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i><b>Date Line:</b> {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</p>
                        </div>
                        {{-- About Company --}}
                        <div class="bg-light rounded p-3 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->
        @endsection