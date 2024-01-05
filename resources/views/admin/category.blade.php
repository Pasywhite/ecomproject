


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

                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
                </div>
                @endif

                <div class="container text-center">
                    <h1 class="text-center mt-5">Add Category</h1>
                    <div class="card w-50 mx-auto mt-3 p-3">

                        <form action="{{ route('admin.addcategory') }}" method="post">
                            @csrf
                            <input type="text" name="category" id="" class="form-control text-white" placeholder="write category name">
                            <input type="submit" name="submit" id="" class="btn btn-primary text-center my-3" value="Add Category">
                        </form>
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
