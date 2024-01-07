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
    "id": 1,
    "product_category_id": 1,
    "product_category_name": "product cat 1",
    "restaurant_id": 1,
    "restaurant_name": "rest name",
    "name": "product a1",
    "quantity": 33,
    "price": 12.99,
    "discount": 0,
    "image": "http://localhost/storage/product_images/product_default_image.png"
},
</pre>
</div>
@endsection

