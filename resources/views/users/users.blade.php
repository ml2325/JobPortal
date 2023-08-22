

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
                    <h4 class="card-title">List of Users</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>  name </th>
                            <th> User type </th>
                            <th> email </th>
                            
                           
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($users as $user)
                            <td> {{$loop->iteration}}</td>
                            <td> {{$user->name}} </td>
                             
                            <td>
                          @if($user->usertype === 'admin')
                          <div class="badge badge-outline-success">{{$user->usertype}}</div>
                          @elseif($user->usertype === 'client')
                          <div class="badge badge-outline-warning">{{$user->usertype}}</div>
                          @endif
                        </td>
                           
                            <td> {{$user->email}} </td>
                           

                            

                            <td ><a class="btn btn-danger"  href="{{url('delete',$user->id)}}" onclick="return confirm('you really want to delete this user !')"><i class="bi bi-trash3-fill"></i></a> </td>
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