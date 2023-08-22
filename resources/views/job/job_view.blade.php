

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="flex justify-content-between align-items-center mb-3">
                <h4 class="card-title">List of Jobs</h4>
                <button class="btn btn-primary" onclick="window.location.href='{{ route('create_job') }}'">Create a job</button>
              </div>
                   

                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                         <th>Job title</th>
                         <th>category</th>
                         <th>Job region</th>
                         <th>Company name</th>
                         <th>Job type</th>
                         <th>Vacency</th>
                         <th>Experience</th>
                         <th>Salary</th>
                         <th>Gender</th>
                         <th>Application deadline</th>
                         <th>Job description</th>
                         <th>Responsibilities</th>
                         <th>Education experience</th>
                         <th>other benefits</th>
                         <th>image</th>
                            <th>Update</th>
                            <th>View</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($jobs as $job )
                          <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$job->job_title}}</td>
                           <td>{{ $job->category->name }}</td>
                           <td>{{$job->job_region}}</td>
                           <td>{{$job->company_name}}</td>
                           <td>{{$job->job_type}}</td>
                           <td>{{$job->vacancy}}</td>
                           <td>{{$job->experience}}</td>
                           <td>{{$job->salary}}</td>
                           <td>{{$job->Gender}}</td>
                           <td>{{$job->application_deadline}}</td>
                           <td>{{$job->job_description}}</td>
                           <td>{{$job->responsibilities}}</td>
                           <td>{{$job->education_experience}}</td>
                           <td>{{$job->otherbenefits}}</td>
                           <td><img  height="100" width="100" src="jobimage/{{$job->image}}" alt=""></td>
                            <td ><a class="btn btn-primary"  href="{{url('update_job',$job->id)}}" ><i class="bi bi-pencil"></i></a> </td>
                            </td>
                            <td ><a class="btn btn-success"  href="{{url('show_job',$job->id)}}" ><i class="bi bi-eye"></i></a> </td>
                            <td ><a class="btn btn-danger"  href="{{url('delete_job',$job->id)}}"  onclick="return confirm('you really want to delete this !')" ><i class="bi bi-trash3-fill"></i></a> </td>
                          </tr>
                       @endforeach
                        </tbody>
                      </table>
                    </div>
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