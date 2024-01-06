
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
         
          <div class="">
            <a class="navbar-brand" href="{{url('/') }}">
               <img width="150" src="{{ asset('images/logo.png') }}" alt="#" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>

          </div>
          <div class="navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.showabout') }}">about</a>
                 </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('home.showproduct') }}">Products</a>
                </li>

                <li class="nav-item">
                   <a class="nav-link" href="{{ route('home.showcontact') }}">Contact</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('home.showcart') }}">Cart
                       @isset( $cart_count )
                       <span class="badge badge-pill bg-primary">{{ $cart_count }}</span>
                       @endisset
                  </a>



                </li>



                <li class="nav-item">
                   <a class="nav-link" href="{{ route('home.showorder') }}">Order

                    @isset( $cart_count )
                       <span class="badge badge-pill bg-primary">{{ $cart_count }}</span>
                       @endisset
                    </a>
                    </li>




                @if (Route::has('login'))

                @auth

                <li class="nav-item">
                    <x-app-layout>
                    </x-app-layout>

                </li>


                 @else

                <li class="nav-item">
                   <a class="btn btn-primary mx-2" href="{{ route('login') }}">login</a>
                </li>
                <li class="nav-item">
                   <a class="btn btn-success" href="{{ route('register') }}">register</a>
                </li>


                 @endauth
                 @endif

             </ul>
          </div>
       </nav>
    </div>
 </header>
