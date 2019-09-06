@extends('layouts.main')

@section('content')
    <h1>Edit clients</h1>
    <hr>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @include('clients.form')
    </form>
@endsection
