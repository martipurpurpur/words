<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use  Illuminate\Support\Collection;

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
     /**   $arrays = [
        ['eng' =>'to point','rus' => 'указывать'],
['eng' =>'unless','rus' =>	'за исключением, пока не, если не'],
['eng' =>'unsupported','rus' =>	'неподдерживаемый'],
['eng' =>'until','rus' =>	'до'],
['eng' =>'usage','rus' =>	'употребление, использование'],
['eng' =>'using','rus' =>	'с помощью'],
['eng' =>'utilizing','rus' =>	'использующий'],
['eng' =>'verify','rus' =>	'проверять'],
        ];
      **/

        $word = new Word();
        $word->fill($request->only(['rus', 'eng']));
        //$word->fill($array);
        $word->save();

        return redirect(route('words.table'));
    }

    public function table()
    {
        $words = Word::all();
       // $wordCollection = collect(['words' => $words]);
      //  $sorted = $wordCollection->sort();

        return view('words.table', ['words' => $words]);
    }

    public function edit($word_id)
    {
        $word = Word::find($word_id);
        return view('words.edit', compact('word', $word));
    }

    public function update(Request $request, $word_id)
    {
        $request->validate([
            'eng' => 'required|min:3',
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
        //dd($word);
    }
}
