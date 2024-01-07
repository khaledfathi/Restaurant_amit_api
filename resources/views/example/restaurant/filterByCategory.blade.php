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
        "id": 1,
        "category_id": 1,
        "category_name": "Sea food Restaurants",
        "name": "rest name",
        "address": null,
        "phone": null,
        "lat": null,
        "long": null,
        "image": "http://localhost/storage/restaurant_images/restaurant_default_image.png"
    },
    {
        "id": 2,
        "category_id": 1,
        "category_name": "Sea food Restaurants",
        "name": "rest name2",
        "address": "addre",
        "phone": "8453785",
        "lat": 4324,
        "long": 584378,
        "image": "http://localhost/storage/restaurant_images/restaurant_default_image.png"
    }
]
</pre>
</div>
@endsection

