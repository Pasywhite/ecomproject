
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



      <div class="col-sm-6 col-md-4 col-lg-4 mx-auto my-5  ">

           <div class="img-box my-3 ">
              <img src="{{ asset('products/'.$products->image) }}" alt="" width="150" class="d-block">
           </div>
           <div class="detail-box">
              <h5>
                 {{ $products->title }}
              </h5>

              @if ($products->discount_price!=null)

              <h6 class="text-danger">
               Discount Price:
               <br>
                 ${{ $products->discount_price }}
              </h6>

              <h6 style="text-decoration: line-through; color:blue">
               price:
               <br>
                 ${{ $products->price }}
              </h6>

              @else
              <h6 class="text-primary">
               price:
               <br>
               ${{ $products->price }}
            </h6>

              @endif

              <h6>Product Category: {{ $products->category }}</h6>
              <h6>Product Description: {{ $products->description }}</h6>
              <h6>product quantity: {{ $products->quantity }}</h6>



              <form action="{{ route('home.addcart', $products->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">

                        <input type="number" name="quantity" id="" value="1" min="1" width="100">
                    </div>

                    <div class="col-md-4">

                        <input type="submit" name="" value="Add to Cart">
                    </div>
                </div>
              </form>



           </div>
        </div>
     </div>


      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="">Key Code</a><br>


         </p>
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

