<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function show(Category $category)
    {
        if ($category->isPictureCategory()) {
            return redirect()->route('category.pictures', ['category' => $category->id]);
        }

        if ($category->isHasChildrenCategory()) {
            $categories = $category->getChildrenCategory();
            return view('category.show', compact('categories'));
        }

        return redirect()->route('category.lettres', ['category' => $category->id]);
    }

    public function lettres(Request $request, Category $category)
    {
        $lettres = $category->lettres()->where('status', 1)->get();
        $title = $category->title;
        return view('category.lettres', compact('lettres', 'title'));
    }

    public function pictures(Request $request, Category $category)
    {
        $pictures = $category->galleries()->where('status', 1)->get();
        $title = $category->title;
        return view('category.pictures', compact('pictures', 'title'));
    }
}
