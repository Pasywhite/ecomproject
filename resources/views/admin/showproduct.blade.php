


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
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-lg-12">

                        @if (session()->has('message'))
                        <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                           {{ session()->get('message') }}
                        </div>

                        @endif

                     <h1 class="text-center mt-3">All Products</h1>
                      <div class="table table-responsive">
                        <table class="table table-bordered text-white bg-info">
                           <thead class="table-dark text-center">
                              <tr>
                                <th>Product title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>Discount Price</th>
                                <th>Product Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                              </tr>
                           </thead>
                           <tbody>
                            @foreach ($products as $product )
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <img src="{{ asset('products/'.$product->image) }}" alt="" width="150">

                                </td>

                                <td>
                                   <a onclick="return confirm('Are You Sure To Delete??')" href="{{ route('admin.deleteproduct', $product->id) }}" class="btn btn-danger">Delete</a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.viewupdateproduct',$product->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                           </tbody>
                        </table>

                      </div>

                    </div>

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
