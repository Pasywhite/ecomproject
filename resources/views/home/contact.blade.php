




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

      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
          <div class="container">
            <div class="card my-5 bg-info text-center text-white ">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-home fa-2x"></i>
                       ADDRESS: No 40 moon light Station Arab Road abuja.
                    </div>

                    <div class="col-4 ">
                        <i class="fa fa-phone fa-2x"></i>
                      PHONE: +2348120232024
                    </div>
                    <div class="col-4">
                      <i class="fa fa-trash fa-2x"></i>
                      EMAIL: keycode@gmail.com.
                    </div>
                </div>
            </div>

            {{-- <i class="fab fa-facebook"></i> <!-- Facebook -->
            <i class="fab fa-whatsapp"></i> <!-- WhatsApp -->
            <i class="fab fa-youtube"></i> <!-- YouTube -->
             <i class="fab fa-instagram"></i> <!-- Instagram --> --}}




          </div>


         @include('home.footer')
      </div>










      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}


   </body>
</html>


