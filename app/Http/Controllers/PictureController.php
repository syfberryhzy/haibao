<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pictureCategory = Category::where('parent_id', 2)->get();
        $hotPictures = Gallery::latest('click_num')->paginate(3);
        $newPictures = Gallery::latest()->paginate(3);
        return view('picture.index', compact('pictureCategory', 'hotPictures', 'newPictures'));
    }

    public function hot()
    {
        $pictures = Gallery::latest('click_num')->get();
        return view('category.pictures', compact('pictures'));
    }

    public function new()
    {
        $pictures = Gallery::latest()->get();
        return view('category.pictures', compact('pictures'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $user = auth()->user();
        Cache::forever("user." . $user->id . "picture", $gallery);
        
        return response(['data' => '选择美图成功'], 201);
    }
}
