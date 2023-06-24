<!DOCTYPE html>
<html lang="en">
  <style>
    .div_center{
      text-align: center;
      padding-top: 40px;
    }
    .h2_font{
      font-size: 40px;
      padding-bottom: 40px;
    }
    .input_color{
      color: black;
    }
  </style>
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.dashboard')
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="div_center">
            <h2 class="h2_font">Add category</h2>
            <form action="">
              <input class="input_color" type="text" name="name" placeholder="Write Category Name">
              <input type="submit" name="submit" value="Add Category" class="btn btn-primary" placeholder="Write Category Name">
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