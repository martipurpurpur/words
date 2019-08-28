@extends('layouts.main')

@section('title', 'Clients')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Full name</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td>{{ $client->fullname }}</td>
                <td>{{ $client->city }}</td>
                <td>
                    <div class="btn-group">

                    <form method="POST" action="/clients/delete/{{ $client->id }}">
                    {{ csrf_field() }}  <!--хелпер, защита от поддельных запросов-->
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <form method="GET" action="/clients/edit/{{ $client->id }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </form>

                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>

            </td>

            <form action="{{route('clients.store')}}" method="POST">
                {{ csrf_field() }}
                <td>
                    <label class="sr-only" for="fullname">Full Name</label>
                    <input type="text" name="fullname" class="form-control mb-2" id=fullname">
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
