@extends('layouts.main')

@section('title', 'Friend list')

@section('content')
    @php
        function getColor($tableClasses) {     /* функция для получения рандомного класса с цветом*/
            $index = array_rand($tableClasses);
            $tableClass = $tableClasses[$index];
            return $tableClass;
        }
    @endphp
    <table class="table">
        <thead>
        <tr class="{{getColor($tableClasses)}}" style="text-align: center">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($friends as $friend)
            <tr class="{{getColor($tableClasses)}}" style="text-align: center">
                <th scope="row">{{ $friend->id }}</th>    {{-- получаем поле объекта фрэнд,--}}
                <td>{{ $friend->name }}</td>               {{-- который является элементом коллекции френдс--}}
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

            <form action="{{route('friends.store')}}" method="POST"> {{--направляем в нужный роут при нажатии--}}
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
