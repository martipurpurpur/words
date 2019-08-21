<?php

namespace App\Http\Controllers;

use App\FriendList;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function index()
    {
        $friends = FriendList::all();

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

        return view('friendlist', ['friends' => $friends, 'tableClasses' => $tableClasses]);
    }
}
