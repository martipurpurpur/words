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
        <tr class = "{{getColor($tableClasses)}}">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
        </tr>
        </thead>
        <tbody>
        <tr class = "{{getColor($tableClasses)}}">
            <th scope="row">{{$friends->id}}</th>
            <td>{{$friends->name}}</td>
            <td>{{$friends->age}}</td>
            <td>{{$friends->city}}</td>
        </tr>
        <tr class = "{{getColor($tableClasses)}}">
            <th scope="row">{{$friends->id}}</th>
            <td>{{$friends->name}}</td>
            <td>{{$friends->age}}</td>
            <td>{{$friends->city}}</td>
        </tr>
        <tr class = "{{getColor($tableClasses)}}">
            <th scope="row">{{$friends->id}}</th>
            <td>{{$friends->name}}</td>
            <td>{{$friends->age}}</td>
            <td>{{$friends->city}}</td>
        </tr>
        </tbody>
    </table>
@endsection
