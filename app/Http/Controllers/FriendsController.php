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
}
