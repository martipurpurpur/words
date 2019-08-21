@extends('layouts.main')

@section('title', 'Friend list')

@section('content')
    @php
        function getColor($tableClasses) {
            $index = array_rand($tableClasses);
            $tableClass = $tableClasses[$index];
            return $tableClass;
        }
    @endphp
    <table class="table">
        <thead>
        <tr class="{{getColor($tableClasses)}}">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
        </tr>
        </thead>
        <tbody>
        @foreach($friends as $friend)
            <tr class="{{getColor($tableClasses)}}">
                <th scope="row">{{ $friend->id }}</th>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->age }}</td>
                <td>{{ $friend->city }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
