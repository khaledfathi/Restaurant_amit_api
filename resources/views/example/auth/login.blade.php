@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{
    "email": "ali@mail.com",
    "password":"1231"
}
</pre>
</div>

<div class="box">
<h4>Response</h4>
<pre>
{
    "operation": true,
    "token": "7|20R2PJlaqNHSB5h5M8BC3LTxG5oMpDueVIbBEHx0879756e4"
}
</pre>
</div>
@endsection

