<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public ">
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
                <h1>Kirim Email kepada {{$order->email}}</h1>
                <form action="{{url('send_user_email', $order->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="greeting" class="form-label">Email greeting</label>
                        <input type="text" class="form-control text-dark" id="greeting" name="greeting">
                    </div>
                    <div class="mb-3">
                        <label for="firstline" class="form-label">Email Baris Pertama</label>
                        <input type="text" class="form-control text-dark" id="firstline" name="firstline">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Email Body : </label>
                        <input type="text" class="form-control text-dark" id="body" name="body">
                    </div>
                    <div class="mb-3">
                        <label for="button" class="form-label">Email Nama Button: </label>
                        <input type="text" class="form-control text-dark" id="button" name="button">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Email Link: </label>
                        <input type="text" value="{{url('print_pdf', $order->id)}}" class="form-control text-dark" id="url" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="lastline" class="form-label">Email Last line: </label>
                        <input type="text" class="form-control text-dark" id="lastline" name="lastline">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>