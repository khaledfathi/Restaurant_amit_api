@extends('example.layout')

@section('subContent')

<div class="box">
<h4>Request</h4>
<pre>
{    
    "name": "new meat product "    
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

