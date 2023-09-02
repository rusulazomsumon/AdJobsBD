@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <h1>Job Portal</h1>
    <p>Find your dream job here!</p>
    <a href="/jobs" class="btn btn-primary">Browse Jobs</a>
    <a href="/jobs/create" class="btn btn-success">Post a Job</a>
</div>
@endsection