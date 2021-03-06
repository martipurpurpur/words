@extends('layouts.main')

@section('title', 'Edit Words')

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
                    <div class="btn-group">

                        <form method="POST" action="/words/delete/{{ $word->id }}">
                        {{ csrf_field() }}  <!--хелпер, защита от поддельных запросов-->
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <form method="GET" action="/words/edit/{{ $word->id }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
