<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $categoryChildren = $category;
        // $categoryChildren = Category::where('parent_id', $category['id'])->get();
        return view('category.show', compact('category', 'categoryChildren'));
    }

    public function lettres()
    {
        return view('category.lettres');
    }
}
