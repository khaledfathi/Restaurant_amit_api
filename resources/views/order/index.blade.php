@extends('order.layout')
@section('content')
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>user</th>
                <th>Time</th>
                <th>Status</th>
                <th>Total</th>
                <th>Full Details</th>
            </tr>
        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>ID={{$record->user_id}} | {{$record->user_name}}</td>
                        <td>{{$record->time}}</td>
                        <td>{{$record->status}}</td>
                        <td>{{$record->total}}</td>                        
                        <td><a href="{{url(route('order.fullDetails', $record->id) )}}">View Details</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
