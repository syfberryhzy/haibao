<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LettreController extends Controller
{
    public function index()
    {
        return view('letter.index');
    }
}
