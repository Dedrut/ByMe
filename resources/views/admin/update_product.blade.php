<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')
   <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px
        }

        .text_color{
            color: black;
            padding-bottom: 20px;
        }

        label{
            display: inline-block;
            width: 200px;
        }

        .div_design
        {
            padding-bottom: 15px;
        }
        .img-center{
            margin: auto;
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
                <div class="div_center">
                    <h1 class="font_size">Edit Produk</h1>

                    <form action="{{ url('update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Judul produk</label>
                            <input class="text_color" value="{{ $product->title }}"   type="text" name="title" placeholder="Write a title">
                        </div>
                        <div class="div_design">
                            <label for="description">product description</label>
                            <input class="text_color" value="{{ $product->description }}"  type="text" name="description" placeholder="Write a description">
                        </div>
                        <div class="div_design">
                            <label for="price">Harga produk</label>
                            <input class="text_color" value="{{ $product->price }}"  type="number" name="price" placeholder="Write a price">
                        </div>
                        <div class="div_design">
                            <label for="discountprice">Harga diskon</label>
                            <input class="text_color" value="{{ $product->discount_price }}" type="text" name="discount_price" placeholder="Write a discountprice">
                        </div>
                        <div class="div_design">
                            <label for="quantity">Jumlah produk</label>
                            <input class="text_color" value="{{ $product->quantity }}"  type="text" name="quantity" placeholder="Write a quantity">
                        </div>
                        <div class="div_design">
                            <label for="category">Kategori produk</label>
                            <select class="text_color" ="" name="category" id="">
                                <option value="{{ $product->category}}" selected="">{{ $product->category }}</option>
                                @foreach ($category as $category)
                                 <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>   
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="image">Gambar produk saat ini</label>
                            <img class="img-center" height="100" src="product/{{ $product->image }}" alt="{{ $product->image }}">
                        </div>
                        <div class="div_design">
                            <label for="image">Ubah gambar produk</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="update product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>