<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::first();
        $query = $request->input('search');
        $author_id = $request->input('author_id');
        $status = $request->input('status');
        $language = $request->input('language');
        $category_id = $request->input('category');
        $count = Book::count();
        $authors = Author::all();
        $languages = Book::distinct()->pluck('language');
        $categories = Category::all();

        /*// Perform your search logic using the query parameter
        $results = Book::where(function ($queryBuilder) use ($query) {
            // Specify the columns you want to search in
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('isbn', 'like', '%' . $query . '%')
                ->orWhereRaw("author_id->'$.authorId.fname' like ?", ['%' . $query . '%'])
                ->orWhereRaw("author_id->'$.authorId.lname' like ?", ['%' . $query . '%']);
        })->get();*/


        // Perform your search logic using the query parameter
        $results = Book::where(function ($queryBuilder) use ($query) {
            // Specify the columns you want to search in
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('isbn', 'like', '%' . $query . '%')
                ->orWhereHas('authorId', function ($authorQueryBuilder) use ($query) {
                    $authorQueryBuilder->where('fname', 'like', '%' . $query . '%')
                        ->orWhere('lname', 'like', '%' . $query . '%');
                });
        })->get();

        if(!$category_id) {

        } else {
            $category = Category::with('books')->find($category_id);
            $results = $category->books;
        }

        if ($author_id == 0) {

        } elseif ($author_id) {
            $results = $results->whereIn('author_id', (array) $author_id);
        }

        if ($status == 1) {

        } elseif ($status == 2) {
            $results = $results->whereIn('status', true);
        } elseif ($status == 3) {
            $results = $results->whereIn('status', false);
        }

        if ($language == 0) {

        } elseif ($language) {
            $results = $results->whereIn('language', $language);
        }

        return view('front.books.index', [
            'results' => $results,
            'settings' => $settings,
        ], compact('categories','authors', 'count', 'languages'));
    }


    public function show($id)
    {
        $settings = Setting::first();
        $data = Book::find($id);
        return view('front.books.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function loan()
    {
        $settings = Setting::first();
        return view('front.books.loan', [
            'settings' => $settings,
        ]);
    }

    public function create($id)
    {
        $active_loans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'Active')
            ->get();
        if ($active_loans->count() >= 3)
        {
            return redirect()->route('index.books.show', ['id' => $id])->with('maxLoan', 'loan');
        }

        $pending_loans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'Pending')
            ->get();
        if ($pending_loans->count() >= 1)
        {
            return redirect()->route('index.books.show', ['id' => $id])->with('pendingLoan', 'loan');
        }
        $loan = new Loan();
        $loan->user_id = Auth::user()->getId();
        $loan->book_id = $id;
        $loan->save();

        return redirect()->route('index.books.show', ['id' => $id])->with('loan', 'loan');
    }
}
