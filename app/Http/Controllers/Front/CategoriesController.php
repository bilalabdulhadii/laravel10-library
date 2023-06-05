<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public static function categoryList()
    {
        return Category::whereNull('parent_id')->with('children')->orderBy('title')->get();
    }

    public function index(Request $request)
    {
        $settings = Setting::first();
        $categories = Category::all();
        $books = Book::all();
        $category_id = $request->input('category');

        if(!$category_id) {
            $results = Book::all();
        } else {
            $category = Category::with('books')->find($category_id);
            $results = $category->books;
        }
        return view('front.categories.index', [
            'settings' => $settings,
            'categories' => $categories,
            'books' => $books,
            'results' => $results,
        ]);
    }

    public function show(string $id)
    {
        $settings = Setting::first();
        $data = Category::find($id);
        return view('front.categories.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }
}
