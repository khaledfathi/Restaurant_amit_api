@extends('layout.main')
@section('tite', 'Orders')
@section('active-api', 'selected')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/layout/example/style.css')}}">
@endsection

@section('content')
<br>
<a class="back-button" href="{{url(route('root'))}}">Back to APIs</a>
<br><br>

@yield('subContent')

@endsection