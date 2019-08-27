@extends('layouts.main')

@section('content')
    <h1>Edit clients</h1>
    <hr>
    <form action="{{route('clients.update', $client->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" value="{{$client->fullname}}" class="form-control" id="fullname"  name="fullname" >
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" value="{{$client->city}}" class="form-control" id="city" name="city" >
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
