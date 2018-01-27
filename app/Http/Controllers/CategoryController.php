<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        return view('category.show');
    }

    public function lettres(Request $request, Category $category)
    {
        $lettres = $category->lettres;
        return view('category.lettres', compact('lettres'));
    }

    public function pictures(Request $request, Category $category)
    {
        $pictures = $category->galleries;
        return view('category.pictures', compact('pictures'));
    }
}
