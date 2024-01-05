


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

                <h1 class="text-center">Send Email to {{ $orders->email }}</h1>

                <form action="{{ route('admin.senduseremail', $orders->id ) }}" method="post">
                    @csrf

                    <div class="text-center my-3">
                        <label for="">Email Greeting</label>
                        <input type="text" name="greeting" id="" class="text-dark">
                    </div>

                    <div class="text-center my-3">
                        <label for="">Email FirstLine :</label>
                        <input type="text" name="firstline" id="" class="text-dark">
                    </div>

                    <div class="text-center my-3">
                        <label for="">Email Body :</label>
                        <input type="text" name="body" id="" class="text-dark">
                    </div>

                    <div class="text-center my-3">
                        <label for="">Email Button Name :</label>
                        <input type="text" name="button" id="" class="text-dark">
                    </div>

                    <div class="text-center my-3">
                        <label for="">Email Url :</label>
                        <input type="text" name="url" id="" class="text-dark">
                    </div>

                    <div class="text-center my-3">
                        <label for="">Email LastLine :</label>
                        <input type="text" name="lastline" id="" class="text-dark">
                    </div>
                    <div class="text-center my-3">

                        <input type="submit" name="" value="Send Email " class="btn btn-primary">
                    </div>



                </form>


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
