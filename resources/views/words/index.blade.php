@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    @foreach ($words as $word)
        @php
            $MIN_COLOR = 10551295;
            $MAX_COLOR = 16777200;
            $color = '#' . (string)dechex(random_int($MIN_COLOR, $MAX_COLOR)); //рандом для цвета
        @endphp
        <!-- Button trigger modal -->
        <span style="font-size: 24pt">
        <button type="button" class="badge badge-pill" style="background-color: {{$color}}; color: black"
                data-toggle="modal" data-target="#myModal-{{ $word->id }}">
            {{$word->eng}}
        </button>
        </span>
        <!-- Modal -->
       @include('words.modal')
    @endforeach
@endsection
   <a href = '{{ route('words') }}' class="btn btn-primary btn-sm">Update</a>

