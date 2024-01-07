@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "email": "change@mail.com",
    "name": "new name", 
    "password":"new password",
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<h5>- if user is Admin: </h5>
<pre>
{
    "operation": true
}
</pre>
</div>
@endsection

