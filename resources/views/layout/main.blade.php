<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'Restaurant API')</title>
    <link rel="stylesheet" href="{{asset('assets/css/layout/style.css')}}">
    @yield('links')
</head>
<body>
    <div>
        <a class="page-link @yield('active-api')" href="{{url(route('root'))}}">APIs</a>
        <a class="page-link @yield('active-user')" href="{{url(route('user.index'))}}">Users</a>
        <a class="page-link @yield('active-restaurant')" href="{{url(route('restaurant.index'))}}">Restaurants</a>
        <a class="page-link @yield('active-product')" href="{{url(route('product.index'))}}">Products</a>
        <a class="page-link @yield('active-order')" href="{{url(route('order.index'))}}">Orders</a>
        <a href="https://github.com/khaledfathi/Restaurant_amit_api" target="_blank"><img src="{{asset("assets/icons/github_icon.jpg")}}" alt="github icon" width="100" height="50"></a>
    </div>
    <div>
    <hr>
        @yield('content')
    </div>
</body>
</html>