@extends('layout.main')
@section('tite', 'Orders')
@section('active-product', 'selected')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/layout/product/style.css') }}">
@endsection

@section('content')
    <br>
    <div>
        <a class = "button @yield('product-selected')" href="{{url(route('product.index'))}}">Products</a>
        <a class = "button @yield('categories-selected')" href="{{url(route('product.categoryIndex'))}}">Categories</a>
    </div><br>
    @yield('subContent')
@endsection
