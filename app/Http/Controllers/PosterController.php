<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Template;
use App\Http\Requests\PosterRequest;
use App\Models\Diy;

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
        $posters = auth()->user()->poster->each(function ($item) {
            $item->image = unserialize($item->image);
            $item->post = unserialize($item->post);
        });
        return view('poster.index', compact('posters'));
    }

    public function store(PosterRequest $request)
    {
        $file_path = request()->file('file')->store('haibao', 'public');

        $user = auth()->user();
        $poster = $user->addPoster([
            'template_id' => $request->template_id,
            'image' => serialize(Cache::get("user." . $user->id . "picture")),
            'post' => serialize(Cache::get("user." . $user->id . "lettre")),
            'diy_image' => $file_path,
            'status' => 1
        ]);
        Cache::forget("user." . $user->id . "picture");
        Cache::forget("user." . $user->id . "lettre");
        
        return response(['data' => $poster], 201);
    }

    public function show(Diy $diy)
    {
        return view('poster.show', compact('diy'));
    }
}
