
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
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
     @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
     @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->


      {{-- comment and reply system starts here --}}

      <div class="text-center">
        <h1 class="text-center text-success my-4" style="font-size: 40px">Comments</h1>
        <form action="{{ route('home.addcomment') }}" method="post">
            @csrf
            <textarea name="comment" class="w-50 d-block mx-auto " placeholder="comment something here"></textarea>
            <input type="submit" class="btn btn-primary" name="" id="" value="comment">
        </form>
      </div>

      <div class="my-3 p-4 text-center">
        <h1 style="font-size: 20px">All Comments</h1>

        @foreach ($comments as $comment )

        <div class="my-3">
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>

            <a href="javascript::void(0);" onclick="reply(this)"  class="btn btn-primary my-2" data-Commentid="{{ $comment->id }}">Reply</a>


            @foreach ($replys as $reply )

            @if ($reply->comment_id==$comment->id)

            <div style="padding-left: 3%; padding-bottom: 10px;">

                <b>{{ $reply->name }}</b>
                <p>{{ $reply->reply }}</p>


            <a href="javascript::void(0);" onclick="reply(this)"  class="btn btn-primary my-2" data-Commentid="{{ $comment->id }}">Reply</a>


            </div>
            @endif
            @endforeach


          </div>
          @endforeach




             {{-- reply Textbox --}}

        <div style="display: none" class="replyDiv">

            <form action="{{ route('home.addreply') }}" method="post">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden="">
                <textarea style="height: 100px; width:500px;" placeholder="write something here" name="reply"></textarea>
                <br>

               <button type="submit" class="btn btn-warning">reply</button>

               <a href="javascript::void(0);" class="btn btn-primary" onclick="reply_close(this)">close</a>
             </div>
            </form>

      </div>
    {{-- end of comment --}}





      {{-- comment and reply system Ends here --}}

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="">Key Code</a><br>


         </p>
      </div>




      <script>

        function reply(caller){

            document.getElementById('commentId').value = $(caller).attr('data-Commentid');


         $('.replyDiv').insertAfter($(caller));

         $('.replyDiv').show();
        }

        function reply_close(caller){



         $('.replyDiv').hide();
        }
      </script>


<script>
    document.addEventListener("DOMContentLoaded", function(event){
      var scrollpos = localStorage.getItem('scrollpos');
      if(scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e){
      localStorage.setItem('scrollpos', window.scrollY);
    };
  </script>



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
