@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
    {
        "product_category_id": 1,       
        "restaurant_id":2,
        "name": "big pizza product",
        "quantity": 90,
        "price": 34.99,
        "discount": 0 ,
        "image" : FILE
    }
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 9,
    "product_category_id": 1,
    "product_category_name": "product cat 1",
    "restaurant_id": 2,
    "restaurant_name": "rest name2",
    "name": "big pizza product",
    "quantity": 0,
    "price": 0,
    "discount": 0,
    "image": "http://localhost/storage/product_images/product_default_image.png",
    "operation": true
}
</pre>
</div>
@endsection

