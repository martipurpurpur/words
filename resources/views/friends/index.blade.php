@extends('layouts.main')

@section('title', 'Friend list')

@section('content')
    @php
        function getColor() {     /* функция для получения рандомного класса с цветом*/
            $MIN_COLOR = 10551295;
            $MAX_COLOR = 16777200;
            $color = '#' . (string)dechex(random_int($MIN_COLOR, $MAX_COLOR)); //рандом для цвета
            return $color;
        }
    @endphp
    <table class="table">
        <thead>
        <tr style="text-align: center; background-color: {{getColor()}}">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($friends as $friend)
            <tr style="text-align: center; background-color: {{getColor()}}">
                <th scope="row">{{ $friend->id }}</th> {{-- получаем поле объекта фрэнд,--}}
                <td>{{ $friend->name }}</td> {{-- который является элементом коллекции френдс--}}
                <td>{{ $friend->age }}</td>
                <td>{{ $friend->city }}</td>
                <td>
                    <form method="POST" action="/friends/delete/{{$friend->id}}">
                    {{ csrf_field() }}  <!--хелпер-->
                        {{ method_field('DELETE') }}
                        {{--
                        создается скрытое поле с методом DELETE,
                        т к в большинстве браузеров форма не принимает методов кроме GET и POST.
                        таким скрытым полем мы "подделываем" форму
                        --}}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-user" value="Delete friend">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>

            </td>

            <form action="{{ route('friends.store') }}" method="POST"> {{--направляем в нужный роут при нажатии--}}
                {{ csrf_field() }}
                <td>
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" name="name" class="form-control mb-2" id=name">
                </td>
                <td>
                    <label class="sr-only" for="age">Age</label>
                    <input type="text" name="age" class="form-control mb-2" id="age">
                </td>
                <td>
                    <label class="sr-only" for="city">City</label>
                    <input type="text" name="city" class="form-control mb-2" id="city">
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Add friend</button>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
@endsection
