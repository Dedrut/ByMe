<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Struk Bukti Pembayaran</h1>
    <h3>Nama Pembeli   : {{$order->name}}</h3>
    <h3>Customer Phone  : {{$order->phone}}</h3>
    <h3>Customer email  : {{$order->email}}</h3>
    <h3>Customer address  : {{$order->address}}</h3>
    <h3>Customer id  : {{$order->id}}</h3>
    <br>
    <h3>Product name  : {{$order->product_title}}</h3>
    <h3>Product price  : {{$order->price}}</h3>
    <h3>Product quantity  : {{$order->quantity}}</h3>
    <h3>Product status  : {{$order->status}}</h3>
    <h3>Product id  : {{$order->product_id}}</h3>
    <h3>Product price  : {{$order->price}}</h3>
    <br><br>
    <img src="product/{{$order->image}}" alt="Failed">
</body>
</html>