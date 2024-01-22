       <!-- including the app (header & footer) -->
        @extends('frontend.layouts.app')

        <!-- Main Home Page Body -->
        @section('content')
        <!-- Carousel Start -->
        @include('frontend.template.carousel')
        <!-- Carousel End -->


        <!-- Search Start -->
        @include('frontend.template.search')
        <!-- Search End -->


        <!-- Category Start -->
        @include('frontend.template.category')
        <!-- Category End -->


        <!-- About Start -->
        @include('frontend.template.about')
        <!-- About End -->


        <!-- Jobs Start -->
        @include('frontend.template.jobs')
        <!-- Jobs End -->

        <!-- CV Generator Start -->
        @include('frontend.template.cvgenarator')
        <!-- CV Generator End -->


        <!-- Testimonial Start -->
        @include('frontend.template.testimonial')
        <!-- Testimonial End -->
        @endsection