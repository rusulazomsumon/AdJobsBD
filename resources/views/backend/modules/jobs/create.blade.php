            <!-- including the app (header & footer) -->
            @extends('backend.layouts.app')

            <!-- Main Home Page Body -->
            @section('content')    

            <!-- main page body content -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add New Job</li>
                        </ol>
                        <div class="row"> 
                            <h3>Create a New Job</h3>

                            {{-- *TODO: Add some Padding and heading beutify all filds, and automated company name, job category, ect forms  --}}

                            {{--************** job adding form *********** --}}
                                <form action="{{ route('dashboard.jobs.store') }}" method="post">
                                    @csrf
                            
                                    <div class="row ">
                                        <div class="row mb-5">
                                            {{-- form head left area --}}
                                            <div class="col-md-8">
                                                <div class="form-group mt-3">
                                                    <label for="title">Job Title:</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                </div>
                                
                                                <div class="form-group mt-3">
                                                    <label for="description">Job Description:</label>
                                                    <textarea class="form-control" id="editor" name="description" rows="4"></textarea>
                                                </div>
                                            </div>

                                            {{-- form head right area (Exclusive) --}}
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="accessibility_needs">Accessibility Needs</label>
                                                    <input type="text" class="form-control" placeholder="eg. Color blindness" name="accessibility_needs" required>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="strengths_and_skills">Strengths and Skills:</label>
                                                    <input type="text" class="form-control" placeholder="eg. problem-solving" name="strengths_and_skills" required>
                                                </div>
                                                  
                                                <div class="form-group mt-3">
                                                    <label for="suggested_accommodations">Suggested Accommodations</label>
                                                    <input type="text" class="form-control" placeholder="eg. High contrast settings" name="suggested_accommodations" required>
                                                </div>

                                            </div>
                                            
                                        </div>

                                        <!-- Column 1 -->
                                        <div class="col-md-4">
                            
                                            <div class="form-group">
                                                <label for="company_id">Company ID:</label>
                                                <input type="number" class="form-control" name="company_id" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="category_id">Category ID:</label>
                                                <input type="number" class="form-control" name="category_id" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deadline">Deadline:</label>
                                                <input type="date" class="form-control" name="deadline" required>
                                            </div>
                                        </div>
                            
                                        <!-- Column 2 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="location">Location:</label>
                                                <input type="text" class="form-control" name="location" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="vacancy">Vacancy:</label>
                                                <input type="text" class="form-control" name="vacancy" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="salary">Salary:</label>
                                                <input type="text" class="form-control" name="salary" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="type">Type:</label>
                                                <input type="text" class="form-control" name="type" required>
                                            </div>
                                        </div>
                            
                                        <!-- Column 3 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="experience_level">Experience Level:</label>
                                                <input type="text" class="form-control" name="experience_level" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="skills">Skills:</label>
                                                <input type="text" class="form-control" name="skills" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="education_level">Education Level:</label>
                                                <input type="text" class="form-control" name="education_level" required>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="benefits">Benefits:</label>
                                                <input type="text" class="form-control" name="benefits" required>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                            
                                    <button type="submit" class="btn btn-primary mt-5">Create Job</button>
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
