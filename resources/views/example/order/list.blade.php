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
[
    {
        "id": 5,
        "user_id": 1,
        "user_name": "admin",
        "status": "in progress",
        "time": "2024-01-07 00:41:51",
        "total": 103.92,
        "products": [
            {
                "restaurant_id": 1,
                "restaurant_name": "rest name",
                "quantity": 3,
                "product_id": 1,
                "product_name": "product a1",
                "price": 12.99,
                "discount": 0,
                "total": 38.97,
                "image": "http://localhost/storage/product_images/product_default_image.png"
            },
            {
                "restaurant_id": 1,
                "restaurant_name": "rest name",
                "quantity": 5,
                "product_id": 1,
                "product_name": "product a1",
                "price": 12.99,
                "discount": 0,
                "total": 64.95,
                "image": "http://localhost/storage/product_images/product_default_image.png"
            }
        ]
    },
    {
        "id": 6,
        "user_id": 1,
        "user_name": "admin",
        "status": "in progress",
        "time": "2024-01-07 00:42:07",
        "total": 103.92,
        "products": [
            {
                "restaurant_id": 1,
                "restaurant_name": "rest name",
                "quantity": 3,
                "product_id": 1,
                "product_name": "product a1",
                "price": 12.99,
                "discount": 0,
                "total": 38.97,
                "image": "http://localhost/storage/product_images/product_default_image.png"
            },
            {
                "restaurant_id": 1,
                "restaurant_name": "rest name",
                "quantity": 5,
                "product_id": 1,
                "product_name": "product a1",
                "price": 12.99,
                "discount": 0,
                "total": 64.95,
                "image": "http://localhost/storage/product_images/product_default_image.png"
            }
        ]
    }
]
</pre>
</div>
@endsection

