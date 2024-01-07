@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{ 
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 8,
    "user_id": 1,
    "status": "in progress",
    "time": "2024-01-07 00:44:25",
    "total": 213.97,
    "products": [
        {
            "order_id": 8,
            "product_id": 1,
            "product_name": "product a1",
            "restaurant_id": 1,
            "restaurant_name": "rest name",
            "quantity": 3,
            "price": 12.99,
            "discount": 0,
            "image": "http://localhost/storage/product_images/product_default_image.png",
            "total": 38.97
        },
        {
            "order_id": 8,
            "product_id": 2,
            "product_name": "product a2",
            "restaurant_id": 1,
            "restaurant_name": "rest name",
            "quantity": 5,
            "price": 35,
            "discount": 0,
            "image": "http://localhost/storage/product_images/product_default_image.png",
            "total": 175
        }
    ]
}
</pre>
</div>
@endsection

