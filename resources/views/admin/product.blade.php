


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

             <div class="card w-50 mx-auto p-5 my-5 bg-info">
                <h2 class="text-center my-3">Add Products</h2>
                <form action="{{ route('admin.addproduct') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="">Product Tile:</label>
                    <input type="text" name="title" id="" class="form-control my-2 text-white" placeholder="write a title" requried>

                    <label for="">Product description:</label>
                    <input type="text" name="description" id="" class="form-control my-2 text-white" placeholder="write description" requried>

                    <label for="">Product Price:</label>
                    <input type="number" name="price" id="" class="form-control my-2 text-white" placeholder="write a price" requried>

                    <label for="">Product Discount Price:</label>
                    <input type="text" name="dis_price" id="" class="form-control my-2 text-white" placeholder="write discount price">

                    <label for="">Product Quantity:</label>
                    <input type="text" name="quantity" id="" class="form-control my-2 text-white" placeholder="write quantity" min="0" requried>


                    <label for="">Product Category:</label>
                    <select name="category" id="" class="form-control my-2 text-white" requried >
                        <option value="">...............</option>
                      @foreach ($categories as $category )
                      <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                      @endforeach

                    </select>

                    <label for="">Product Image:</label>
                    <input type="file" name="image" id="" class="form-control my-2 text-white" placeholder="" requried>

                    <input type="submit" class="btn btn-primary my-3" value="Add Product">
                </form>

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
