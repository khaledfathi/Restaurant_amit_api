@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "user_id": 1 , 
    "products": [
        {
            "product_id": 4, 
            "quantity": 4
        },
        {
            "product_id": 6, 
            "quantity": 1
        }        
    ]
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 2,
    "user_id": 1,
    "status": "in progress",
    "time": "2024-01-07 21:15:02",
    "total": 555,
    "products": [
        {
            "order_id": 2,
            "product_id": 4,
            "product_name": "test product 1.2 AA",
            "restaurant_id": 1,
            "restaurant_name": "Noble House",
            "quantity": 4,
            "price": 120,
            "discount": 0,
            "image": "http://localhost/storage/product_images/product_default_image.png",
            "total": 480
        },
        {
            "order_id": 2,
            "product_id": 6,
            "product_name": "test product 1.2 AC",
            "restaurant_id": 1,
            "restaurant_name": "Noble House",
            "quantity": 1,
            "price": 95,
            "discount": 20,
            "image": "http://localhost/storage/product_images/product_default_image.png",
            "total": 75
        }
    ]
}
</pre>
</div>
@endsection

