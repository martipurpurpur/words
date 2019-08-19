<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index()
    {
        {
            $words = ['template', 'engine', 'accept', 'helper'];
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
            return view('learningWords', ['words' => $words, 'classes' => $classes]);
        }
    }
}
