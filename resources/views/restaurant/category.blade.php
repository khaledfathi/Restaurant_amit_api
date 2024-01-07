@extends('restaurant.layout')
@section('categories-selected', 'button-selected')

@section('subContent')
<div class="table-container">
    <table class="table" style="min-width:500px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td><img src="{{ url($record->image) }}" alt="No Image" width="50" , height="50"></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>
@endsection
