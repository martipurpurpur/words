<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function index()
    {
        {
            $words = Word::all();
          //  dd($words);
            $classes = [
                'badge-primary',
                'badge-secondary',
                'badge-success',
                'badge-danger',
                'badge-warning',
                'badge-info',
                'badge-light',
                'badge-dark',
            ];
            return view('words.index', ['words' => $words, 'classes' => $classes]);
        }
    }
}
