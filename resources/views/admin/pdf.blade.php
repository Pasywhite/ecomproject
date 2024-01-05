<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Order Details</h1>

   Customer Name :<h3>{{ $orders->name }}</h3>
   Customer Email  :<h3>{{ $orders->email }}</h3>
   Customer phone  :<h3>{{ $orders->phone }}</h3>
   Customer address :<h3>{{ $orders->address }}</h3>
   Customer id :<h3>{{ $orders->user_id }}</h3>
   product Name :<h3>{{ $orders->product_title }}</h3>
   product price  :<h3>{{ $orders->price }}</h3>
   product quantity  :<h3>{{ $orders->quantity }}</h3>
   payment Status :<h3>{{ $orders->payment_status }}</h3>
   product Id  :<h3>{{ $orders->product_id }}</h3>
   <br><br>

   <img src="products/{{ $orders->image }}" alt="" width="150" height="250">
</body>
</html>
