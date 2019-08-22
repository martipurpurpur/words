@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    @foreach ($words as $word)
        @php
           $index = array_rand($colors);
            $color = $colors[$index];

        @endphp
        <span style="font-size: 16pt">
            <a href="#" class="badge badge-pill" style="background-color: {{$color}}; color: black">{{ $word->eng }}<br>{{ $word->rus }}</a>
        </span>
    @endforeach
@endsection
