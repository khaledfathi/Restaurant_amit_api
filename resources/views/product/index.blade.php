@extends('product.layout')
@section('product-selected', 'button-selected')

@section('subContent')
    <div class= "table-container">
        <table class="table" style="min-width:1200px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Restaurant</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>ID={{ $record->product_category_id }} | {{ $record->product_category_name }}</td>
                            <td>ID={{ $record->restaurant_id }} | {{ $record->restaurant_name }}</td>
                            <td><img src="{{ url($record->image) }}" alt="No Image" width="50" height="50"></td>
                            <td>{{ $record->quantity }}</td>
                            <td>{{ $record->discount }}</td>
                            <td>{{ $record->price }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
