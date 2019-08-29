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
        <div class="modal fade" id="myModal-{{ $word->id }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$word->eng}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$word->rus}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
