@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "email": "ramy@mail.com",
    "name": "ramy", 
    "password":"mysecret"
    "image" : FILE
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "id": 11,
    "name": "ramy",
    "email": "ramy@mail.com",
    "image": "http://localhost/storage/user_images/user_default_image.jpg",
    "operation": true
}
</pre>
</div>
@endsection

