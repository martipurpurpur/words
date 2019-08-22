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
            return view('words.index', ['words' => $words]);
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
