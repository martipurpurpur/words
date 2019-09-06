
@extends('layouts.main')

@section('title', 'Edit words')

@section('content')
    <h1>Edit words</h1>
    <hr>
    <form action="{{ route('words.update', $word->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="eng">English</label>
            <input type="text" value="{{ $word->eng }}" class="form-control" id="eng"  name="eng" >
        </div>
        <div class="form-group">
            <label for="rus">Russian</label>
            <input type="text" value="{{ $word->rus }}" class="form-control" id="rus" name="rus" >
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
