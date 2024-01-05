
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
      <title>Ecomproject</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

         <div class="container my-4">
            <div class="row">
                <div class="col-md-4 col-sm-3 col-lg-12">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-white bg-info">
                           <thead class="table-dark text-center">
                              <tr>
                                <th>Product title</th>
                                <th>Quantity</th>
                                <th>price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Image</th>
                                <th>Cancel Order</th>

                              </tr>
                           </thead>
                           <tbody>
                            @foreach ($orders as $order )
                            <tr>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>

                                <td>
                                    <img src="{{ asset('products/'.$order->image) }}" alt="" width="150" height="200">
                                </td>

                                <td>
                                    @if ($order->delivery_status=='processing')

                                    <a onclick="return confirm('Are You Sure to Cancel this Order??')" href="{{ route('home.cancelorder',$order->id) }}" class="btn btn-danger">Cancel Order</a>

                                    @else

                                    <p class="text-dark">Not Allowed</p>

                                    @endif
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
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>
