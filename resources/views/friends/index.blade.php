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
            <th scope="col" style="text-align: center">id</th>
            <th scope="col" style="text-align: center">Name</th>
            <th scope="col" style="text-align: center">Age</th>
            <th scope="col" style="text-align: center">City</th>
            <th scope="col" style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($friends as $friend)
            <tr class="{{getColor($tableClasses)}}">
                <th scope="row">{{ $friend->id }}</th>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->age }}</td>
                <td>{{ $friend->city }}</td>
                <td>
                    <form method="POST" action="/friends/delete/{{$friend->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-user" value="Delete friend">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>

            </td>

            <form action="{{route('friends.store')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <td>
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" name="name" class="form-control mb-2" id=name">
                </td>
                <td>
                    <label class="sr-only" for="age">Age</label>
                    <input type="text" name="age" class="form-control mb-2" id="age">
                </td>
                <td>
                    <label class="sr-only" for="city">City</label>
                    <input type="text" name="city" class="form-control mb-2" id="city">
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
@endsection
