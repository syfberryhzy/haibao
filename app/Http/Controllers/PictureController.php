<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;

class PictureController extends Controller
{
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
}
