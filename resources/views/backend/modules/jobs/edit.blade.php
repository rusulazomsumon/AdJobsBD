{{-- @dd($job)
+"id": 18
+"title": "test company"
+"description": "<p>test company</p>"
+"company_id": 2
+"category_id": 1
+"location": "Mohammadpur, Dhaka"
+"vacancy": "3"
+"salary": "32000"
+"type": "Remote"
+"experience_level": "2 years"
+"skills": "Bangla English Typing"
+"education_level": "Undergraduate (or Less Depend on Skill)"
+"benefits": "2 day holiday, festival bonus"
+"deadline": "2024-02-03"
+"is_active": 1
+"created_at": "2024-01-14 15:47:13"
+"updated_at": "2024-01-14 15:47:13"
+"accessibility_needs": "Any Kinds of Disable People"
+"strengths_and_skills": "Good Writing"
+"suggested_accommodations": "High Contrast Setting, Use Screen Reader"
+"company_name": "Creative IT"
+"category_name": "IT" --}}

           <!-- including the app (header & footer) -->
           @extends('backend.layouts.app')

           <!-- Main Home Page Body -->
           @section('content')    

           <!-- main page body content -->
               <main>
                   <div class="container-fluid px-4">
                       <h1 class="mt-4">Dashboard</h1>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item active">Edit Your Job</li>
                       </ol>
                       <div class="row"> 
                            {{-- exception massage --}}
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

                           {{-- *TODO: Add some Padding and heading beutify all filds, and automated company name, job category, ect forms  --}}

                           {{--************** job adding form *********** --}}
                           <form action="{{ route('dashboard.jobs.update', $job->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                   <div class="row ">
                                       <div class="row mb-5">
                                           {{-- form head left area --}}
                                           <div class="col-md-8">
                                               <div class="form-group mt-3">
                                                   <label for="title"><h6>Job Title</h6></label>
                                                   <input type="text" class="form-control" name="title" value="{{ $job->title }}" required>
                                               </div>
                                               
                                               {{-- job descriptin --}}
                                               <div class="form-group mt-3">
                                                   <label for="description"><h6>Job Description</h6></label>
                                                   <textarea class="form-control" id="editor" name="description" rows="4">{{ $job->description }}</textarea>
                                               </div>

                                           </div>

                                           {{-- form head right area (Exclusive) --}}
                                           <div class="col-md-4">
                                               <div class="form-group mt-3">
                                                   <label for="accessibility_needs"><h6>Accessibility Needs</h6></label>
                                                   <input value="{{ $job->accessibility_needs }}" type="text" class="form-control" placeholder="eg. Color blindness" name="accessibility_needs" required>
                                               </div>

                                               <div class="form-group mt-3">
                                                   <label for="strengths_and_skills"><h6>Strengths and Skills</h6></label>
                                                   <input value="{{ $job->strengths_and_skills }}" type="text" class="form-control" placeholder="eg. problem-solving" name="strengths_and_skills" required>
                                               </div>
                                                 
                                               <div class="form-group mt-3">
                                                   <label for="suggested_accommodations"><h6>Suggested Accommodations</h6></label>
                                                   <input value="{{ $job->suggested_accommodations }}" type="text" class="form-control" placeholder="eg. High contrast settings" name="suggested_accommodations" required>
                                               </div>

                                           </div>
                                           
                                       </div>

                                       <!-- Column 1 -->
                                       <div class="col-md-4">
                           
                                           {{-- company name --}}
                                           <div class="form-group mb-3">
                                               <label for="company_id"><h6>Company</h6></label>
                                               <select class="form-control" name="company_id" required>
                                                   <option value="{{ $job->company_id }}" selected >{{ $job->company_name }}</option>
                                                   @foreach ($companies as $company)
                                                       <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           
                                           {{-- job category --}}
                                           <div class="form-group mb-3">
                                               <label for="category_id"><h6>Job Category</h6></label>
                                               <select class="form-control" name="category_id" required>
                                                   <option value="{{ $job->category_id }}" selected disabled>{{ $job->category_name }}</option>
                                                   @foreach ($categories as $category)
                                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           
                           
                                           {{-- dade line --}}
                                           <div class="form-group mb-3">
                                               <label for="deadline"><h6>Deadline</h6></label>
                                               <input value="{{ $job->deadline }}" type="date" class="form-control" name="deadline" required>
                                           </div>
                                       </div>
                           
                                       <!-- Column 2 -->
                                       <div class="col-md-4">
                                           <div class="form-group mb-3">
                                               <label for="location"><h6>Location</h6></label>
                                               <input value="{{ $job->location }}" type="text" class="form-control" name="location" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="vacancy"><h6>Vacancy</h6></label>
                                               <input value="{{ $job->vacancy }}" type="text" class="form-control" name="vacancy" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="salary"><h6>Salary</h6></label>
                                               <input value="{{ $job->salary }}" type="text" class="form-control" name="salary" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="type"><h6>Job Type</h6></label>
                                               <input value="{{ $job->type }}" type="text" class="form-control" name="type" required>
                                           </div>
                                       </div>
                           
                                       <!-- Column 3 -->
                                       <div class="col-md-4">
                                           <div class="form-group mb-3">
                                               <label for="experience_level"><h6>Experience Level</h6></label>
                                               <input value="{{ $job->experience_level }}" type="text" class="form-control" name="experience_level" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="skills"><h6>Skills</h6></label>
                                               <input value="{{ $job->skills }}" type="text" class="form-control" name="skills" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="education_level"><h6>Education Level</h6></label>
                                               <input value="{{ $job->education_level }}" type="text" class="form-control" name="education_level" required>
                                           </div>
                           
                                           <div class="form-group mb-3">
                                               <label for="benefits"><h6>Benefits</h6></label>
                                               <input value="{{ $job->benefits }}" type="text" class="form-control" name="benefits" required>
                                           </div>
                           
                                           
                                       </div>
                                   </div>
                           
                                   <button type="submit" class="btn btn-primary mt-5">Update Job</button>
                               </form>
                           
                           {{-- job form end --}}
                       </div>

                   </div>
                   {{-- end of counterner --}}
               </main>
           @endsection

           {{-- pushing js for this page to main page --}}
           @push('js')
               {{-- <script src="/ckeditor/ckeditor.js"></script> --}}
               <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
               <script>
                   ClassicEditor
                   .create(document.querySelector('#editor'))
                   .catch(error=>{
                       console.error(error);
                   });
               </script>

           @endpush
