

<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">



          <div>
            <form action="{{ route('home.viewproductsearch') }}" method="GET">
                @csrf
                <input style="width: 500px" type="text" name="search" placeholder="search for something">
                <input type="submit" value="search">
            </form>
          </div>

       </div>


       @if(session()->has('message'))
       <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{ session()->get('message') }}
       </div>
       @endif


       <div class="row">

           @foreach ($products as $product )

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ route('home.productdetail', $product->id) }}" class="option1">
                      Product Details
                      </a>


                      <form action="{{ route('home.addcart', $product->id) }}" method="post">
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
                <div class="img-box">
                   <img src="{{ asset('products/'.$product->image) }}" alt="" width="150">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $product->title }}
                   </h5>

                   @if ($product->discount_price!=null)

                   <h6 class="text-danger">
                    Discount Price:
                    <br>
                      ${{ $product->discount_price }}
                   </h6>

                   <h6 style="text-decoration: line-through; color:blue">
                    price:
                    <br>
                      ${{ $product->price }}
                   </h6>

                   @else
                   <h6 class="text-primary">
                    price:
                    <br>
                    ${{ $product->price }}
                 </h6>

                   @endif

                </div>
                 <div>
{{--
                    <div>
                        <span>Total Available Quantity: {{ $total_available_products[$product->id]  }}</span>
                    </div> --}}
                    {{-- <span>
                        Total Available products: {{ $total_available_products }}
                    </span> --}}
                    <div>
                        @isset($total_available_products)
                        <span>Total Available Quantity: {{ $total_available_products[$product->id]  }}</span>
                        @endisset
                    </div>

                 </div>

             </div>
          </div>


          @endforeach
          <span class="my-3">
            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
         </span>


    </div>
 </section>
