



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      <!-- partial:partials/_navbar.html -->
      @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="container">
                <h1 class="text-center mt-5">All Category</h1>
                  @if (session()->has('message'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                     {{ session()->get('message') }}
                  </div>

                  @endif
                <div class="table-responsive mt-2">
                  <table class="table table-bordered">
                     <thead class="table-dark text-center">
                        <tr>
                            <th>Category Name</th>
                            <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($categories as $category )
                       <tr>
                        <td>{{ $category->category_name }}</td>

                        <td>
                            <a onclick="return confirm('Are you Sure to delete??')" href="{{ route('admin.deleteallcategory',$category->id) }}" class="btn btn-danger">Delete</a>
                        </td>

                       </tr>
                       @endforeach
                     </tbody>
                  </table>
                </div>


              </div>
            </div>
         </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
