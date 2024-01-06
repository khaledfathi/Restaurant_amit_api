@extends('layout.main')
@section('tite', 'Orders')
@section('active-restaurant', 'selected')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/layout/restaurant/style.css') }}">
@endsection

@section('content')
    <br>
    <div>
        <a class = "button @yield('restaurants-selected')" href="{{url(route('restaurant.index'))}}">Restaurants</a>
        <a class = "button @yield('categories-selected')" href="{{url(route('restaurant.categoryIndex'))}}">Categories</a>
    </div><br>
    @yield('subContent')
@endsection
