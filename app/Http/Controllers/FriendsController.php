<?php

namespace App\Http\Controllers;

use App\FriendList;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index()
    {
        $friends = FriendList::all();  /*вызываем статический метод класса френлист,
                                        *для вызова статических методов не требуется создание экземпляра класса
                                         */
        // dd($friends);
    //возвращаем вью с данными: ассоциативным массивом содержащим еще массив
        return view('friends.index', ['friends' => $friends]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $friend = new FriendList(); //создаем объект класса фрэндлист
        $friend->fill($request->only(['name', 'age', 'city'])); /*вызываем метод фил, наследуемый от этого класса
                                                                * в нем вызываем метод only класса реквест
                                                                * передаем туда массив с названиями полей
                                                                *  "заполняем" "только" данные поля
                                                                */
        $friend->save();
        return redirect(route('friends'));  //перенаправляемся в роут с именем френдс
    }

    public function delete($friend_id)
    {
        $friend = FriendList::find($friend_id); /*
                                                 *присваиваем френда из таблицы с определенным айди,
                                                  * который мы передали в методе делит
                                                  * для этого мы обращаемся к статическому методу файнд
                                                    * класса френдлист
                                                 */
        $friend->delete();
        return redirect(route('friends'));
        // dd($friend);
    }
}
