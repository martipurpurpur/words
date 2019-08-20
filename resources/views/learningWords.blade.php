@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    @foreach ($words as $word)
        @php
            $index = array_rand($classes);
            $class = $classes[$index];
        @endphp
        <span class="badge {{ $class }}">{{ $word->eng }} : {{ $word->rus }}</span>
    @endforeach
@endsection
