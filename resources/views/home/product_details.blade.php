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
      <title>ByMe - Detail Produk</title>
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
      <!-- why section -->
        <div class="d-flex justify-content-center">
         <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                  
                </div>
                <div class="img-box" >
                   <img src="/product/{{$product->image}}" alt="no img">
                </div>
                <div class="detail-box">
                  <h5>
                      {{$product->title}}
                     </h5>
                     @if($product->discount_price!=null)
                     <h6 style="text-decoration: line-through;">                        
                        ${{$product->price}}
                     </h6>
                     <h6 style="color: red;">                     
                        ${{$product->discount_price}}
                     </h6>
                     @else
                     <h6>
                        ${{$product->price}}
                     </h6>
                  @endif
                  <h6>Product Category: {{$product->category}}</h6>
                  <h6>Description: {{$product->description}}</h6>
                  <h6>Available Quantity: {{$product->quantity}}</h6>
                  <form action="{{url('add_cart', $product->id)}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" style="width: 100px;" value="1" min="1">                              
                           </div>
                           <div class="col-md-4">
                              <input type="submit" value="Add to chart">
                           </div>
                        </div>
                     </form>                    
                </div>
             </div>
          </div>
      </div>
      </div>

          
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      
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