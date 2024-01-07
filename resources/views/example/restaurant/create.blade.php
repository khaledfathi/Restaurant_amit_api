@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "restaurant_category_id": 1,
    "name": "good restaurant",
    "address": "str , cairo ,egypt",
    "phone": "02123123123" ,
    "lat": 32.32122,
    "long": 12.321321
    "image": FILE
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 3,
    "category_id": 1,
    "category_name": "Sea food Restaurants",
    "name": "good restaurant",
    "address": "str , cairo ,egypt",
    "phone": "02123123123",
    "lat": 32.32122,
    "long": 12.321321,
    "image": "http://localhost/storage/restaurant_images/restaurant_default_image.png",
    "operation": true
}
</pre>
</div>
@endsection

