@include('frontend.partials.header')
        <!-- 404 Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1">@yield('code')</h1>
                        <h1 class="mb-4">@yield('message')</h1> 
                        <!-- @yield('message') -->
                        <p class="mb-4">@yield('details')</p>
                        <a class="btn btn-primary py-3 px-5" href="@yield('btnurl')">@yield('btntxt')</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 End -->
@include('frontend.partials.footer')