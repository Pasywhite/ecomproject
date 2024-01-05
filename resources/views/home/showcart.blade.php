
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



    <div class="container p-5">
        <div class="row">
            <div class="col-md-4 col-sm-3 col-lg-12">
                <h1 class="text-center my-3">All Carts</h1>

                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
                </div>
                @endif



              <div class="table table-responsive">
                <table class="table table-bordered text-white bg-info">
                   <thead class="table-dark text-center">
                      <tr>
                        <th>Product title</th>
                        <th>Product Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>

                      </tr>
                   </thead>
                   <tbody>

                    <?php $totalprice =0; ?>



                    @foreach ($carts as $cart )
                    <tr>
                        <td>{{ $cart->product_title }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td> ${{ $cart->price}}</td>

                        <td>
                            <img src="{{ asset('products/' .$cart->image) }}" alt="" width="100">
                        </td>

                        <td>
                            <a onclick="return confirm('Are You Sure To Remove to remove this product??')" class="btn btn-danger" href="{{ route('home.removecart', $cart->id) }}">Remove product</a>
                        </td>

                    </tr>

                     <?php $totalprice=$totalprice + $cart->price ?>

                    @endforeach

                   </tbody>
                </table>

                <div class="text-center my-3">
                    <h1>Total Price: ${{$totalprice}}</h1>
                </div>

                <div class="text-center mt-3">
                    <h1 class="my-2">Proceed to Order</h1>
                    <a href="{{ route('home.cashorder') }}" class="btn btn-danger">Cash on Delivery</a>
                    <a href="{{ route('home.stripe',$totalprice) }}" class="btn btn-danger">Pay Using Card</a>
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
