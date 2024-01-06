@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "name": "sea foods"
    "image": FILE
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 6,
    "name": "sea foods",
    "image": "http://localhost/storage/restaurant_category_images/restaurant_category_default_image.png",
    "operation": true
}
</pre>
</div>
@endsection

