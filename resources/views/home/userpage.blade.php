<!DOCTYPE html>
<html>
   <head>
        {{-- <base href="/public"> --}}
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>ByMe - Ecommerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
      {{-- cdn link --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      @include('sweetalert::alert')
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
      @include('home.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- Comment and reply system -->
      <div>
         <form action="{{url('add_comment')}}" method="POST">
            @csrf
            <div class="form-floating">
               <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
               <label for="floatingTextarea2">Ulasan</label>
            </div>
            <input type="submit" class="btn btn-primary" value="comment">
         </form>
      </div>

      <div>
         <h1>Seluruh Ulasan</h1>
         @foreach($comment as $comment)
         <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a style="color: blue;" href="javascript::void(0);" onClick="reply(this)" data-Commentid="{{$comment->id}}">Balas</a>
            <!-- Reply -->
            @foreach($reply as $rep)
            @if($rep->comment_id==$comment->id)
            <div style="padding-left: 3%;" class="pb-2">
               <b>{{$rep->name}}</b>
               <p>{{$rep->reply}}</p>
               <a style="color: blue;" href="javascript::void(0);" onClick="reply(this)" data-Commentid="{{$comment->id}}">Balas</a>
            </div>
            @endif
            @endforeach
            <!-- End Reply -->
         </div>
         @endforeach
      </div>
      
      
      <!-- Reply TextBox -->
      <div style="display: none;" class="replyDiv">
         <form action="{{url('add_reply')}}" method="POST">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden="">
            <textarea name="reply" placeholder="tulis ulasanmu di sini"></textarea>
            <button type="submit" class="btn btn-warning">Kirim</button>            
            <a href="javascript::void(0);" class="btn" onClick="reply_close(this)">Tutup</a>
         </form>
      </div>
      <!-- End Reply TextBox -->
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="#" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();

         }
         function reply_close(caller)
         {
            $('.replyDiv').hide();
         }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <!-- keep scroll position -->
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script> 
   </body>
</html>