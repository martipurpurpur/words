<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordsController extends Controller
{
    public function index()
    {

        $words = DB::table('words')
            ->orderByRaw('-LOG(1.0 - RAND())/ counter LIMIT 3')->get();
        return view('words.index', ['words' => $words]);

    }

    public function create()
    {
        return view('words.create');
    }

    public function store(Request $request)
    {
        $word = new Word();
        $word->fill($request->only(['rus', 'eng']));
        $word->save();
        return redirect(route('words.table'));
    }

    public function table()
    {
        $words = Word::orderBy('eng')->get();
        return view('words.table', ['words' => $words]);
    }

    public function edit($word_id)
    {
        $words = Word::find($word_id);
        return view('words.edit', ['words' => $words]);
    }

    public function update(Request $request, $word_id)
    {
        $request->validate([
            'eng' => 'required|min:2',
            'rus' => 'required',
        ]);
        $word = Word::find($word_id);
        $word->eng = $request->get('eng');
        $word->rus = $request->get('rus');
        $word->save();
        return redirect(route('words.table'));
    }

    public function delete($word_id)
    {
        $word = Word::find($word_id);
        $word->delete();
        return redirect(route('words.table'));
    }

    public function counter($word_id)
    {
        Word::find($word_id)->increment('counter');
        return redirect(route('words'));
    }
}

