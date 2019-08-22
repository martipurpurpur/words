<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    protected $table = "friends"; //таблица должна иметь имя как у модели, но во мне числе и с мал.буквы
    protected $fillable = ['name', 'age', 'city']; //разрешение на заполнение полей
}
