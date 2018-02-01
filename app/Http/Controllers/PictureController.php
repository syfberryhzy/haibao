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
        $pictureCategory = Category::where('parent_id', Category::TUPIAN_PID)->get();
        $hotPictures = Gallery::where('status', 1)->latest('click_num')->paginate(3);
        $newPictures = Gallery::where('status', 1)->latest()->paginate(3);
        return view('picture.index', compact('pictureCategory', 'hotPictures', 'newPictures'));
    }

    public function hot()
    {
        $pictures = Gallery::where('status', 1)->latest('click_num')->get();
        $title = '最热图片';
        return view('category.pictures', compact('pictures', 'title'));
    }

    public function new()
    {
        $pictures = Gallery::where('status', 1)->latest()->get();
        $title = '最新图片';
        return view('category.pictures', compact('pictures', 'title'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $user = auth()->user();
        Cache::forever("user." . $user->id . "picture", $gallery);
        return response(['data' => '选择美图成功'], 201);
    }
}
