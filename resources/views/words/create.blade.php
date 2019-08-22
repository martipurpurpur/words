@extends('layouts.main')

@section('title', 'Learning Words')

@section('content')
    <form method="POST" action="{{route('words.store')}}">
        @include('words.form')    {{--сюда передаем внутренности формы с /words/form.blade.php--}}
    </form>
@endsection

{{--
POST предназначен для запроса,
при котором веб-сервер принимает данные,
заключённые в тело сообщения, для хранения
--}}
