@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    <form method="POST" action="{{route('words.store')}}">
        @include('words.form')
    </form>
@endsection
