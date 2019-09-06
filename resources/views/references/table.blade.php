@extends('layouts.main')

@section('title', 'Edit Function Reference')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Termin</th>
            <th scope="col">Definition</th>
            <th scope="col">Signature</th>
            <th scope="col">Example</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($references as $reference)
            <tr>
                <td>{{ $reference->termin }}</td>
                <td>{{ $reference->definition }}</td>
                <td>{{ $reference->signature }}</td>
                <td><code>{{$reference->example}}</code></td>
                <td>
                    <div class="btn-group">

                        <form method="POST" action="/references/delete/{{ $reference->id }}">
                        {{ csrf_field() }}  <!--хелпер, защита от поддельных запросов-->
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <form method="GET" action="/references/edit/{{ $reference->id }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
        <form action="{{route('references.store')}}" method="POST">
           @include('references.form')
        </form>
        </tbody>
    </table>
@endsection

