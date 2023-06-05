<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WritersController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::first();
        $query = Author::query();

        $selected_char = $request->input('char');
        if ($selected_char) {
            $query->where(function ($queryBuilder) use ($selected_char) {
                $queryBuilder->where('fname', 'like', $selected_char . '%')
                    ->orWhere('lname', 'like', $selected_char . '%');
            });

            $authors = $query->orderBy('fname')->orderBy('lname')->get();
        }
        else {
            $authors = Author::all();
        }

        $char_counts = [];
        foreach (range('A', 'Z') as $char) {
            $char_counts[$char] = $authors->filter(function ($author) use ($char) {
                return Str::startsWith(strtolower($author->fname), strtolower($char))
                    || Str::startsWith(strtolower($author->lname), strtolower($char));
            })->count();
        }

        return view('front.writers.index', [
            'settings' => $settings,
        ], compact('authors', 'selected_char', 'char_counts'));
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Author::find($id);
        $books = Book::where('author_id', $id)->get();
        return view('front.writers.show', [
            'data' => $data,
            'settings' => $settings,
        ], compact('books'));
    }
}
