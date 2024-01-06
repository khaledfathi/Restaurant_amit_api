@extends('order.layout')

@section('content')
    <br>
    <a class="back-button" href="{{ url(route('order.index')) }}">Back To Orders</a>
    <br><br><br>
    @if ($orderRecord)
        <div style="border: 1px solid black; padding:10px">
            <p>ID : {{ $orderRecord->id }}</p>
            <p>User : ID={{ $orderRecord->user_id }} | {{ $orderRecord->user_name }}</p>
            <p>Time : {{ $orderRecord->time }}</p>
            <p>Status : {{ $orderRecord->status }}</p>
            <p>Total : {{ $orderRecord->total }}</p>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Restaurant</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach ($orderRequestsRecords as $orderRequestsRecord)
                    <tbody>
                        <tr>
                            <td>{{$orderRequestsRecord->id}}</td>
                            <td>ID={{$orderRequestsRecord->product_id}} | {{$orderRequestsRecord->product_name}}</td>
                            <td>ID={{$orderRequestsRecord->restaurant_id}} | {{$orderRequestsRecord->restaurant_name}}</td>
                            <td>{{$orderRequestsRecord->quantity}}</td>
                            <td>{{$orderRequestsRecord->price}}</td>
                            <td>{{$orderRequestsRecord->discount}}</td>
                            <td>{{$orderRequestsRecord->total}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @endif
@endsection
