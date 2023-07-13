<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data = Author::all();
        return view('admin.author.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.author.create', [
            'settings' => $settings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'nullable',
        ]);

        $existingAuthor = Author::where('fname', $request->fname)
            ->where(function ($query) use ($request) {
                $query->where('lname', $request->lname)
                    ->orWhereNull('lname');
            })
            ->first();

        if ($existingAuthor) {
            // Handle the case where the author already exists
            // You can send an error message or perform any other necessary action.
            return back()->with('error', 'The author "'.$request->fname.' '.$request->lname.'" already exists');
        }

        $data = new Author();
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->dates = $request->birth_date.' - '.$request->death_date;
        if (!$request->description)
        {
            $data->description = "This author has made significant contributions to the literary world. Their works encompass a wide array of genres and themes, captivating readers with compelling narratives and thought-provoking storytelling. With a distinct writing style, this author has left an indelible mark on literature, earning acclaim and a dedicated readership.";
        } else {
            $data->description = $request->description;
        }
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('image');
        }

        $data->save();
        return redirect()->route('admin.author');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Author::find($id);
        $books = Book::where('author_id', $id)->get();
        return view('admin.author.show', [
            'data' => $data,
            'settings' => $settings,
        ], compact('books'));
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = Author::find($id);
        list($birth_date, $death_date) = explode('-', $data->dates);
        return view('admin.author.edit', [
            'data' => $data,
            'settings' => $settings,
        ], compact('birth_date', 'death_date'));
    }

    public function update(Request $request, $id)
    {
        $data = Author::find($id);
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->dates = $request->birth_date.' - '.$request->death_date;
        $data->description = $request->description;
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
        return redirect()->route('admin.author');
    }

    public function destroy(Author $author, $id)
    {
        $data =Author::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.author');
    }
}
