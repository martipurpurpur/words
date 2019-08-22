<?php

namespace App\Http\Controllers;

use App\FriendList;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index()
    {
        $friends = FriendList::all();
        // dd($friends);
        $tableClasses = [
            'table-primary',
            'table-secondary',
            'table-success',
            'table-danger',
            'table-warning',
            'table-info',
            'table-light',
            'table-dark',
        ];

        return view('friends.index', ['friends' => $friends, 'tableClasses' => $tableClasses]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $friend = new FriendList();
        $friend->fill($request->only(['name', 'age', 'city']));
        $friend->save();
        return redirect(route('friends'));
    }

    public function delete($friend_id)
    {
        $friend = FriendList::find($friend_id);
        $friend->delete();
        return redirect(route('friends'));
        // dd($friend);
    }
}
