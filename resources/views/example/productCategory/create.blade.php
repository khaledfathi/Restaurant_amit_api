@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{    
    "name": "meat product "
    "image": FILE
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 5,
    "name": "meat product",
    "image": "http://localhost/storage/product_category_images/product_category_default_image.png",
    "operation": true
}
</pre>
</div>
@endsection

