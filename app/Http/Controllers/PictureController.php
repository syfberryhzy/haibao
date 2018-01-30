<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;

class PictureController extends Controller
{
    public function index()
    {
        $pictureCategory = Category::where('parent_id', Category::TUPIAN_PID)->get();
        // dd($categorys);
        return view('picture.index', compact('pictureCategory'));
    }
}
