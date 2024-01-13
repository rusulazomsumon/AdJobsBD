<!-- including header -->
@include('backend.partials.header')

<!-- including home page -->
@yield('content')
<script src="app.js"></script>  
@stack('js')

<!-- including footer -->
@include('backend.partials.footer')
