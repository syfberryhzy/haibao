<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PosterRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\Template;
use App\Models\Diy;

class PosterController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $template = Template::where('status', 1)->first();
        return view('poster.create', compact('template'));
    }
}
