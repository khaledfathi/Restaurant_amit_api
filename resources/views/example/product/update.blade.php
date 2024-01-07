@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "quantity": 100,
    "price": 44.99,
    "discount": 10   
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "operation": true
}
</pre>
</div>
@endsection

