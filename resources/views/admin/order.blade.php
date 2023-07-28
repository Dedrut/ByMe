<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    <div class="text-center">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <div class="">
                            <h1 class="">Semua Pesanan</h1>
                        </div>
                        <div class="row">
                            <form action="{{url('search')}}" method="GET">
                                @csrf
                                <div class="col mb-2">
                                    <input class="form-control text-black" type="text" name="search" placeholer="Cari">
                                </div>
                                <div class="col mb-4">
                                    <input type="button" class="btn btn-primary" value="search">
                                </div>
                            </form>
                        </div>
                            <div class="table-responsive">                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telp</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Status Pembayaran</th>
                                            <th scope="col">Status Pengiriman</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Konfirmasi</th>                            
                                            <th scope="col">Print PDF</th>                            
                                            <th scope="col">Kirim Email</th>                                                                 
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse($order as $order)
                                        <tr>
                                            <th scope="row">{{$order->name}}</th>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->product_title}}</td>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{$order->delivery_status}}</td>
                                            <td><img src="/product/{{$order->image}}" alt="{{$order->image}}"></td>
                                            @if($order->delivery_status == 'Processing')
                                            <td><a onclick="return confirm('Apakah kamu yakin barang sudah terkirim?')" class="btn btn-primary" href="{{url('delivered', $order->id)}}">Delivered</a></td>
                                            @else
                                            <td class="text-success">Terkirim</td>
                                            @endif
                                            <td><a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a></td>
                                            <td><a href="{{url('send_email', $order->id)}}" class="btn btn-info">Kirim Email</a></td>
                                        </tr>
                                        @empty
                                        <div>
                                            <tr coolspan="26">                                            
                                                <td>Data tidak ditemukan</td>
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
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>