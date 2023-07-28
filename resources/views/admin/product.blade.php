<!DOCTYPE html>
<html lang="en">
  <head>
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
                    <h1 class="font_size">Tambah Produk</h1>

                    <form action="{{ url('add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Judul Produk</label>
                            <input class="text_color" required type="text" name="title" placeholder="Write a title">
                        </div>
                        <div class="div_design">
                            <label for="description">Deskripsi Produk</label>
                            <input class="text_color" required type="text" name="description" placeholder="Write a description">
                        </div>
                        <div class="div_design">
                            <label for="price">Harga Produk</label>
                            <input class="text_color" required type="number" name="price" placeholder="Write a price">
                        </div>
                        <div class="div_design">
                            <label for="discountprice">Harga Diskon</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="Write a discountprice">
                        </div>
                        <div class="div_design">
                            <label for="quantity">Jumlah Produk</label>
                            <input class="text_color" required type="number" name="quantity" placeholder="Write a quantity">
                        </div>
                        <div class="div_design">
                            <label for="category">Kategori Produk</label>
                            <select class="text_color" required="" name="category" id="">
                                <option value="" selected="">Add category here</option>
                                @foreach ($category as $category)
                                 <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>   
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="image">product image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="add product" class="btn btn-primary">
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