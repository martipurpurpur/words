@extends('layouts.main')

@section('title', 'Friend list')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Eng</th>
            <th scope="col">Rus</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($words as $word)
            <tr>
                <td>{{ $word->eng }}</td>
                <td>{{ $word->rus }}</td>
                <td>
                    <form method="POST" action="/words/delete/{{$word->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-user" value="Delete word">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
