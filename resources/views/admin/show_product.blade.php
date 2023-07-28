<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style type="text/css">
        .center{
            margin : auto;
            width : 80%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            font-size: 40px;
            text-align: center;
            padding top: 20px;
        }
        .img_size
        {
            height:150px ;
        }
        .tr_color
        {
            background-color:#6973FF;
            color:white;
        }
        .th_deg
        {
            padding: 15px;
        }


   </style>
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
                </div>
                @endif
                <h2 class="font_size">Semua Produk</h2>
                <div class="responsive text-center">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Produk</th>                            
                                <th scope="col">Jumlah</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Harga Diskon</th>
                                <th scope="col">Gambar Produk</th>
                                <th scope="col">Ubah</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-devider">
                            @foreach($product as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                {{-- <td>{{$product->description}}</td> --}}
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price}}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td><img class="img_size" src="/product/{{ $product->image }} " alt="{{ $product->image }}"> </td>
                                <td><a class="btn btn-success" href="{{ url('update_product', $product->id ) }}">Edit</a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_product', $product->id ) }}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>