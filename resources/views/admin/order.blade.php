


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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-sm-3 col-lg-12">

                            <h1 class="text-center mt-3">All Order</h1>

                            <div class="text-center text-dark my-3">

                                <form action="{{ route('admin.search') }}" method="get">
                                    @csrf

                                    <input type="text" name="search" id="" placeholder="search for something">

                                    <input type="submit" value="search" id="" class="btn btn-outline-primary">


                                </form>



                            </div>




                            <div class="table table-responsive container-fluid">
                              <table class="table table-bordered text-white bg-info">
                                 <thead class="table-dark text-center">
                                    <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      {{-- <th>Address</th> --}}
                                      <th>Phone</th>
                                      <th>Product_title</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Payment status</th>
                                      <th>Delivery status</th>
                                      <th>Image</th>
                                      <th>Delivered</th>
                                      <th>PrintPDF</th>
                                      <th>SendEmail</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                   {{-- if you are using @empty you need to change the foreach loop to forelse, and the for empty was used because
                                   of the searchText we used  --}}


                                  @forelse ( $orders as $order )
                                  <tr>
                                      <td>{{ $order->name }}</td>
                                      <td>{{ $order->email }}</td>
                                      {{-- <td>{{ $order->address }}</td> --}}
                                      <td>{{ $order->phone }}</td>
                                      <td>{{ $order->product_title }}</td>
                                      <td>{{ $order->quantity }}</td>
                                      <td>{{ $order->price }}</td>
                                      <td>{{ $order->payment_status }}</td>
                                      <td>{{ $order->delivery_status }}</td>

                                      <td>
                                         <img src="{{ asset('products/' .$order->image) }}" alt="">
                                      </td>

                                      <td>
                                        @if($order->delivery_status=='processing')
                                         <a onclick="return confirm('Are You Sure This product is Delivered??')" href="{{ route('admin.delivered',$order->id) }}" class="btn btn-primary">Delivered</a>

                                         @else
                                         <p class="text-success">Delivered</p>

                                         @endif
                                      </td>
                                      <td>
                                        <a href="{{ route('admin.printpdf',$order->id) }}" class="btn btn-secondary">Print PDF</a>
                                      </td>
                                      <td>
                                        <a href="{{ route('admin.sendemail',$order->id) }}" class="btn btn-info">SendEmail</a>
                                      </td>
                                  </tr>

                                  @empty
                                 <tr>
                                    <td colspan="16">
                                        <p>No Data Found</p>
                                    </td>
                                 </tr>


                                  @endforelse

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
