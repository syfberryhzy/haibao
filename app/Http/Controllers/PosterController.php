<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Template;

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
        $picture = Cache::get("user." . $user->id . "picture");
        
        $template = Template::where('status', 1)->first();
        return view('poster.create', compact('lettre', 'picture', 'template'));
    }

    public function index()
    {
        return view('poster.index');
    }
}
