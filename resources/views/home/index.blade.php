<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amit Restaurant API</title>
</head>
<body>
    <h1>Amit Restaurant API</h1>
    <hr>
    <h4>For Test </h4>
    <a href="{{url('/')}}/api/user">List of users</a><br><br>

    <a href="{{url('/')}}/api/restaurant-category">List of Restaurant categories</a><br>
    <a href="{{url('/')}}/api/restaurant">List of Restaurants</a><br>
    {{-- restaurant filters --}}
    <a href="{{url('/')}}/api/restaurant/filter-by-category/1">filter restaurants by category id {id = 1}</a><br>
    <a href="{{url('/')}}/api/restaurant/filter-by-category/2">filter resturant by category id {id = 2}</a><br><br>


    <a href="{{url('/')}}/api/product-category">List of Product categories</a><br>
    <a href="{{url('/')}}/api/product">List of Products</a><br><br>
    {{-- product filters --}}
    <a href="{{url('/')}}/api/product/filter-by-category/1">filter Products by category id {id = 1}</a><br>
    <a href="{{url('/')}}/api/product/filter-by-category/2">filter Products by category id {id = 2}</a><br>
    <a href="{{url('/')}}/api/product/filter-by-restaurant/1">filter Products by restaurant id {id = 1}</a><br>
    <a href="{{url('/')}}/api/product/filter-by-restaurant/2">filter Products by restaurant id {id = 2}</a><br>
    <a href="{{url('/')}}/api/product/filter-by-category/1/and-restaurant/1">filter Products by category and restaurant id {category = 1 , restaurant= 1}</a><br>
    <a href="{{url('/')}}/api/product/filter-by-category/1/and-restaurant/2">filter Products by category and restaurant id {category = 1 , restaurant= 2}</a><br>
</body>
</html>