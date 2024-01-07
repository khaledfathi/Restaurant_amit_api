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
        "name": "product cat 1",
        "image": "http://localhost/storage/product_category_images/product_category_default_image.png"
    },
    {
        "id": 2,
        "name": "product cat 2",
        "image": "http://localhost/storage/product_category_images/product_category_default_image.png"
    }
]
</pre>
</div>
@endsection

