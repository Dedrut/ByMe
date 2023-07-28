<!DOCTYPE html>
<html>
   <head>
        <!-- cdn sweetalert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      <title>ByMe - Keranjang</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .my_img-size{
            height: 100px;
            widht: 100px;
            margin: auto;
        }
      </style>
   </head>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md text-center">          
                    <div class="table-responsive">
                        <table class="table p-3">
                            <thead>
                                <tr>
                                    <th scope="col">Judul Produk</th>
                                    <th scope="col">Jumlah Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalprice = 0; ?>
                                @forelse($cart as $cart)
                                <tr>
                                    <td>{{$cart->product_title}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->price}}</td>
                                    <td><img class="my_img-size" src="/product/{{$cart->image}}" alt="{{$cart->image}}">{{$cart->product_title}}</td>
                                    <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('remove_cart', $cart->id)}}">Remove</a></td>
                                </tr>
                                <?php $totalprice += $cart->price ?>
                                @empty
                                <div>
                                    <tr coolspan="26">                                            
                                        <td>Keranjang mu masih kosong</td>
                                    </tr>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- @if(count($cart) > 0) --}}
        <div class="mb-5">
            <p>Total Harga: ${{$totalprice}}</p>
            <p>Lanjutkan Pemesanan</p>
            <a href="{{url('cash_order')}}" class="btn btn-danger">cash on delivery</a>
            <a href="{{url('stripe', $totalprice)}}" class="btn btn-danger">Bayar Menggunakan Kartu</a>            
          </div>
        {{-- @endif --}}
        </div>
  
        <!-- footer start -->
       
        <!-- footer end -->
        {{-- <div class="cpy_">
           <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
           
              Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
           </p>
        </div> --}}
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <!-- auto keep scroll -->
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- end keep scroll position -->
    <!-- sweetalert -->
    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Apakah kamu yakin membatalkan pemesanan",
            text: "Pesanan mu akan disingkirkan dari keranjang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {                 
                window.location.href = urlToRedirect;               
            }
        });
    }
    </script>
    <!-- end sweetalert -->
   </body>
</html>