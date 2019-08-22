@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    @foreach ($words as $word)
        @php
            // $index = array_rand($colors); //цвета из массива можно брать
             // $color = $colors[$index];
             $MIN_COLOR = 10551295;
             $MAX_COLOR = 16777200;
             $color = '#' . (string)dechex(random_int($MIN_COLOR, $MAX_COLOR)); //рандом для интеджер

        @endphp
        <span style="font-size: 16pt">
            <a href="#" class="badge badge-pill" style="background-color: {{$color}}; color: black">{{ $word->eng }}<br>{{ $word->rus }}</a>
        </span>
    @endforeach
@endsection
