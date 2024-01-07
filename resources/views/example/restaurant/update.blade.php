@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{    
    "name": "change good restaurant ",    
    "phone": "0288998899888"     
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

