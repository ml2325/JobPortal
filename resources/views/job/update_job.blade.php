

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
    
                    <h4 class="card-title">Update</h4>
              
                   
                    <form action="{{url('edit_job',$job->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
          {{session()->get('message')}}
          </div>
          @endif
                      <div class="form-group">
                        <label for="">Job title</label>
                        <input type="text" class="form-control" name="job_title" value="{{ $job->job_title}}">
                      </div>
                      <div class="form-group">
                        <label for="">Job region</label>
                        <input type="text" class="form-control" name="job_region"  value="{{ $job->job_region}}">
                      </div>
                      <div class="form-group">
                        <label for="">Job type</label>
                        <input type="text" class="form-control" name="job_type"  value="{{ $job->job_type}}">
                      </div>
                      <div class="form-group">
                        <label for="">Company name</label>
                        <input type="text" class="form-control" name="company_name"  value="{{ $job->company_name }}" >
                      </div>
                      <div class="form-group">
                        <label for="">experience</label>
                        <input type="text" class="form-control" name="experience" value="{{ $job->experience}}">
                      </div>
                      <div class="form-group">
                        <label for="">application deadline</label>
                        <input type="date" class="form-control" name="application_deadline" value="{{ $job->application_deadline}}">
                      </div>
                      <div class="form-group">
                        <label for="">vacancy</label>
                        <input type="text" class="form-control" name="vacancy" value="{{ $job->vacancy}}">
                      </div>
                      <div class="form-group">
                        <label for="">Gender</label>
                        <select class="form-control" name="Gender" value="{{ $job->Gender}}">
                          <option>{{ $job->Gender}}</option>
                      
                        </select>
                      </div>
                     
                      <div class="form-group">
                        <label for="">salary</label>
                        <input type="number" class="form-control" name="salary" value="{{ $job->salary}}">
                      </div>
                      <div class="form-group">
                        <label for="">Job description</label>
                        <input type="text" class="form-control" name="job_description" value="{{  $job->job_description }}" >
                      </div>
                      <div class="form-group">
                        <label for="">responsibilities</label>
                        <input type="text" class="form-control" name="responsibilities" value="{{  $job->responsibilities }}" >
                      </div>
                      <div class="form-group">
                        <label for="">education experience </label>
                        <input type="text" class="form-control" name="education_experience" value="{{  $job->education_experience }}" >
                      </div>
                      <div class="form-group">
                        <label for="">other benifits</label>
                        <input type="text" class="form-control" name="otherbenefits" value="{{  $job->otherbenefits }}" >
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <img src="jobimage/{{$job->image}}"  height="150" width="150" alt="">
                       </div>

        <div  class="form-group">
            <label for="">Change image</label>
            <input type="file" name="file">
        </div>
                        
                   
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      
                    </form>
                  </div>
                </div>
              </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>