@extends('layout.main')
@section('tite', 'Users')
@section('active-user', 'selected')
@section('links')
    <link rel="stylesheet" href="">
@endsection

@section('content')
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td><img src="{{url($record->image)}}" alt="No Image" width=50 height="50"></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
