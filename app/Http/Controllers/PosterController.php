<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PosterController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = auth()->user();
        $lettre = Cache::get("user." . $user->id . "lettre");
        return view('poster.create', compact('lettre'));
    }

    public function index()
    {
        return view('poster.index');
    }
}
