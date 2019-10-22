<?php

namespace App\Http\Controllers;

use App\Reference;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    public function index()
    {
        $references = Reference::all();
        return view('references.index', ['references' => $references]);
    }

    public function table()
    {
        $references = Reference::all();
        return view('references.table', ['references' => $references]);
    }

    public function store(Request $request)
    {
        $reference = new Reference(); //создаем объект класса
        $reference->fill($request->only(['termin', 'definition', 'signature', 'example']));

        $request->validate([
            'termin' => 'required|unique:references|min:3|max:100',
            'definition' => 'required|min:1|max:100',
            'signature' => 'required|min:1|max:100',
            'example' => 'required|min:1|max:100',
        ]);
echo 'test';
        $reference->save();
        echo 'test two';
        return redirect(route('references.table'));
    }

    public function delete($reference_id)
    {
        $reference = Reference::find($reference_id);
        $reference->delete();
        return redirect(route('references.table'));
    }

    public function edit($reference_id)
    {
        $reference = Reference::find($reference_id);
        return view('references.edit', compact('reference', $reference));
    }

    public function update(Request $request, $reference_id)
    {
        $request->validate([
            'termin' => [
                'required',
                Rule::unique('references')->ignore($reference_id),
                'min:3',
                'max:100',
            ],
            'definition' => 'required|min:1|max:100',
            'signature' => 'required|min:1|max:100',
            'example' => 'required|min:1|max:100',
        ]);

        $reference = Reference::find($reference_id);

        $reference->termin = $request->get('termin');
        $reference->definition = $request->get('definition');
        $reference->signature = $request->get('signature');
        $reference->example = $request->get('example');
        $reference->save();
        return redirect(route('references.table'));
    }
}
