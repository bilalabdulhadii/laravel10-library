<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    protected $appends = [
        'parentTree'
    ];

    public static function parentTree($category, $title)
    {
        if ($category->parent_id == 0) return $title;
        $parent = Category::find($category->parent_id);
        $title = $parent->title.' > '.$title;
        return CategoryController::parentTree($parent, $title);
    }

    public function index()
    {
        $settings = Setting::first();
        $data = Book::all();
        return view('admin.book.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book.create', [
            'settings' => $settings,
        ], compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        // validate user_name
        $validatedData = $request->validate([
            'isbn' => 'required|string',
        ]);
        // find if the user_name is exists or not
        $book = Book::where('isbn', $validatedData['isbn'])->first();
        // return wrong message if not exists
        if ($book) {
            return redirect()
                ->back()
                ->withInput()
                ->with(['error' => 'The entered ISBN "'.$request->isbn.'" is already exists.']);
        }

        // Check if a book with the same title and edition already exists
        $existingBook = Book::where('title', $request->title)
            ->where('edition', $request->edition)
            ->first();

        // Check if a book with the same title but different edition exists
        $otherEditionBook = Book::where('title', $request->title)
            ->where('edition', '!=', $request->edition)
            ->first();

        // Return error message if a book with the same title and edition exists
        if ($existingBook) {
            return redirect()
                ->back()
                ->withInput()
                ->with(['error' => 'The entered book "'.$request->title.'" is already exists, with the same edition']);
        }

        // Return error message if a book with the same title but different edition exists
        if ($otherEditionBook) {
            return redirect()
                ->back()
                ->withInput()
                ->with(['warning' => 'The entered book "'.$request->title.'" is already exists, with different edition']);
        }

        $data = new Book();
        $data->title = $request->title;
        $data->author_id = $request->input('author_id', null);
        $data->isbn = $request->isbn;
        if (!$request->description) {
            $data->description = "Explore the pages of this captivating book, where imagination knows no bounds. Written by a talented author, this literary treasure offers a compelling narrative that will transport you to new worlds and engage your senses. With its masterful storytelling and rich characters, this book promises an unforgettable reading experience. Dive into its pages and let your imagination soar.";
        } else {
            $data->description = $request->description;
        }
        $data->quantity_available = $request->quantity_available;
        $data->language = $request->language;
        $data->publication_year = $request->publication_year;
        $data->edition = $request->edition;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('image');
        }
        $data->save();

        // Attach categories to the book
        $categoryIds = $request->input('category_id', []);
        if (!empty($categoryIds) && $categoryIds[0] !== null) {
            $data->categories()->attach($categoryIds);
        }

        return redirect()->route('admin.book');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Book::findOrFail($id);
        return view('admin.book.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = Book::find($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book.edit', [
            'data' => $data,
            'settings' => $settings,
        ], compact('authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->author_id = $request->input('author_id', null);
        $data->isbn = $request->isbn;
        $data->description = $request->description;
        $data->quantity_available = $request->quantity_available;
        $data->language = $request->language;
        $data->publication_year = $request->publication_year;
        $data->edition = $request->edition;
        $data->status = $request->status;
        if ($request->del_image) {
            Storage::delete($data->image);
            $data->image = null;
        } else {
            if ($request->file('image')) {
                if ($data->image)
                {
                    Storage::delete($data->image);
                }
                $data->image = $request->file('image')->store('image');
            }
        }
        $data->save();

        // Delete existing categories
        $data->categories()->detach();

        // Attach categories to the book
        $categoryIds = $request->input('category_id', []);
        if (!empty($categoryIds) && $categoryIds[0] !== null) {
            $data->categories()->attach($categoryIds);
        }
        return redirect()->route('admin.book');
    }

    public function destroy($id)
    {
        $data =Book::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.book');
    }
}
