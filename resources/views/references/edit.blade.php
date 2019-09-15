@extends('layouts.main')

@section('content')
    <h1>Edit function reference</h1>
    <hr>
    <form action="{{ route('references.update', $reference->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="termin">Termin</label>
            <input class="form-control" id="termin" name="termin" type="text" value="{{ $reference->termin }}">
        </div>
        <div class="form-group">
            <label for="definition">Definition</label>
            <input class="form-control" id="definition" name="definition" type="text" value="{{ $reference->definition }}">
        </div>
        <div class="form-group">
            <label for="signature">Signature</label>
            <input class="form-control" id="signature" name="signature" type="text" value="{{ $reference->signature }}">
        </div>
        <div class="form-group">
            <label for="example">Example</label>
            <input class="form-control" id="example" name="example" type="text" value="{{ $reference->example }}">
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

