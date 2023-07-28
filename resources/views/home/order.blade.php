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
      <title>ByMe - Pesanan</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
      <style>
        .my_img-size{
            height: 100px;
            widht: 100px;
            margin: auto;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="container">
             <div class="row">
                <div class="col-md text-center">          
                    <div class="table-responsive">
                        <table class="table p-3">
                            <thead>
                                <tr>
                                    <th scope="col">Judul Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status Pembayaran</th>
                                    <th scope="col">Status Pengiriman</th>
                                    <th scope="col">Gambar</th>                                                    
                                    {{-- <th scope="col">Singkirkan Barang</th>                                                     --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order as $order)
                                <tr>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td><img class="my_img-size" src="/product/{{$order->image}}" alt="{{$order->image}}"></td>
                                    {{-- <td>
                                        @if($order->delivery_status == 'Processing')
                                        <a onclick="return confirm('Apakah kamu yakin ingin membatalkan pemesanan')" class="btn btn-danger" href="{{url('cancel_order', $order->id)}}">Batalkan</a>
                                        @else
                                        <p class="text-danger">Batalkan</p>
                                        @endif
                                    </td> --}}
                                </tr>
                                @empty
                                <div>
                                    <tr coolspan="26">                                            
                                        <td class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                </div>
                                @endforelse                        
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
         </div>
      </div>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>