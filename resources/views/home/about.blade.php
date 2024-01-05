


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
            <div class="row">
                <div class="col-md-4 col-sm-3 col-lg-12">
                    <p class="my-5 text-center">
                        <b>

                            <h1 class="text-center my-5">

                             About <span class="text-warning">Ecom</span>
                            </h1>

                            Welcome to ECOM, where our passion for Products meets the convenience of online shopping. Founded in [2020], we set out on a mission to [To be the leading company in terms of your need].

                            <h1 class="text-center my-5">

                             <span class="text-warning">Our Story</span>
                               </h1>


                            [Ecom] began as a small team of [3 members] enthusiasts who shared a common vision – to revolutionize the way people experience [our products]. Frustrated with the limitations of traditional [industry] shopping, we embarked on a journey to create a platform that combines quality, convenience, and innovation.

                            What Sets Us Apart
                            At [Ecom], we take pride in [specific aspect that sets us apart – it could be unique products, exceptional customer service, etc.]. Our commitment to [core value or principle] is the driving force behind everything we do. We believe in [another core belief] and strive to [related action or goal].

                            <h1 class="text-center my-5">

                                <span class="text-warning">Our Products</span>
                               </h1>

                            Explore our curated selection of [describe your products] designed to [highlight key benefits or solve specific problems]. From [feature product] to [another feature product], each item is carefully chosen to provide our customers with [mention unique selling points].

                            {{-- <h1 class="text-center my-5">


                                <span class="text-warning">Meet The Team</span>
                               </h1>

                            Behind every successful eCommerce venture is a dedicated team. Get to know the faces behind [Your Company Name]. Our diverse team brings together expertise in [relevant fields] and a shared passion for [industry or product]. --}}

                             {{-- [Include brief introductions and photos of key team members.] --}}

                            {{-- Our Commitment to You
                            Customer satisfaction is at the heart of [Your Company Name]. We understand the importance of a seamless shopping experience, which is why we offer [mention key features such as easy returns, secure payments, etc.]. Your trust in us is our greatest reward. --}}
                            <h1 class="text-danger my-5 text-center">

                                Join Us on the Journey
                            </h1>

                            As we continue to grow and innovate, we invite you to be a part of our journey. Whether you're a longtime customer or just discovering us, we appreciate your support. Together, let's redefine our industry and make every shopping experience with Ecom memorable.

                            Thank you for choosing ecom

                            {{-- [Contact Information and Social Media Links] --}}


                        </b>

                    </p>

                </div>

            </div>



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

