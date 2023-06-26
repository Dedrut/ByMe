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
                    <h1 class="font_size">Edit Product</h1>

                    <form action="{{ url('add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">product title</label>
                            <input class="text_color" value="{{ $product->title }}"  required type="text" name="title" placeholder="Write a title">
                        </div>
                        <div class="div_design">
                            <label for="description">product description</label>
                            <input class="text_color" value="{{ $product->description }}" required type="text" name="description" placeholder="Write a description">
                        </div>
                        <div class="div_design">
                            <label for="price">product price</label>
                            <input class="text_color" value="{{ $product->price }}" required type="number" name="price" placeholder="Write a price">
                        </div>
                        <div class="div_design">
                            <label for="discountprice">discount price</label>
                            <input class="text_color" value="{{ $product->discount_price }}" type="text" name="discount_price" placeholder="Write a discountprice">
                        </div>
                        <div class="div_design">
                            <label for="quantity">product quantity</label>
                            <input class="text_color" value="{{ $product->quantity }}" required type="text" name="quantity" placeholder="Write a quantity">
                        </div>
                        <div class="div_design">
                            <label for="category">product category</label>
                            <select class="text_color" required="" name="category" id="">
                                <option value="{{ $category->category_name }}" selected="">value="{{ $category->category_name }}"</option>
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="image">Current product image</label>
                            <img height="100" src="product/{{ $product->image }}" alt="{{ $product->image }}">
                        </div>
                        <div class="div_design">
                            <label for="image">Change product image</label>
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