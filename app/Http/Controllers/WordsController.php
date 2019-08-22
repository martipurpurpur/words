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
            $colors = [
                '#e0ffff',
                '#e7d5f9',
                '#a1cbdd',
                '#eeede7',
                '#f7aec2',
                '#f9c099',
                '#a3c185',
                '#ffa5a9',
                '#fd742d',
                '#b0d3bf',
                '#a3ccf4',
                '#81acc3',
                '#faf4e8',
                '#f590b1',
                '#d77237',
                '#00b6b0',
                '#a6e9d7',
                '#bea698',
                '#ffc0d1',
                '#ffc87c',
                '#f87070',
                ];

            return view('words.index', ['words' => $words, 'colors' => $colors]);
        }
    }

    public function create()
    {
        return view('words.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $word = new Word();
        $word->fill($request->only(['rus', 'eng']));
        $word->save();
        return redirect(route('words'));
    }

    public function table()
    {
        $words = Word::all();

        return view('words.table', ['words' => $words]);
    }

    public function delete($word_id)
    {
        $word = Word::find($word_id);
        $word->delete();
        return redirect(route('words'));
        //dd($word);
    }
}
