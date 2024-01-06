@extends('restaurant.layout')
@section('restaurants-selected', 'button-selected')

@section('subContent')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Lat</th>
                <th>Long</th>
            </tr>
        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>ID={{ $record->category_id }} | {{ $record->category_name }}</td>
                        <td><img src="{{ url($record->image) }}" alt="No Image" width="50" , height="50"></td>
                        <td>{{ $record->address ?? '---' }}</td>
                        <td>{{ $record->phone ?? '---' }}</td>
                        <td>{{ $record->lat ?? '---'}}</td>
                        <td>{{ $record->long ?? '---'}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
