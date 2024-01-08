        <!-- including the app (header & footer) -->
        @extends('frontend.layouts.app')
        <!-- Main Home Page Body -->
        <!-- Carousel Start -->
        @section('content')

        <!-- cv genarator Start -->
        <!-- make this section dynamic , collect the view from template parts -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">ADJobsBD CV Bank</h1>
                        <p class="mb-4">Find Your Virtual Employee</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Genarate CV</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        @endsection

