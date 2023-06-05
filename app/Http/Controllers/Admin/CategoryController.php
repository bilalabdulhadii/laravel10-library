<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
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
        $data = Category::all();
        return view('admin.category.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        $categories = Category::all();
        return view('admin.category.create', [
            'settings' => $settings,
        ], compact('categories'));
    }

    public function store(Request $request)
    {
        /*// validate category_title
        $validatedData = $request->validate([
            'title' => 'required|string',
        ]);
        // Check if the entered category_title already exists among other categories
        $category = Category::where('title', $validatedData['title'])->first();
        // return error message if the category_title already exists
        if ($category) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered Category "'.$request->title.'" already exists, please enter another category']);
        }*/

        $data = new Category();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->keywords = $request->keywords;
        $data->parent_id = $request->input('parent_id', null);
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('image');
        }
        $data->save();
        return redirect()->route('admin.category');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Category::findOrFail($id);
        return view('admin.category.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = Category::find($id);
        $categories = Category::whereNotIn('id', [$id])->get();
        return view('admin.category.edit', [
            'data' => $data,
            'settings' => $settings,
        ], compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);

        /*// validate category_title
        $validatedData = $request->validate([
            'title' => 'required|string',
        ]);
        // Check if the entered category_title already exists among other categories (excluding the current category)
        $category = Category::where('title', $validatedData['title'])
            ->where('id', '!=', $data->id)
            ->first();
        // return error message if the category_title already exists
        if ($category) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered Category "'.$request->title.'" already exists, please enter another category']);
        }*/

        $data->parent_id = $request->input('parent_id', null);
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
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
        return redirect()->route('admin.category');
    }

    public function destroy($id)
    {
        $data =Category::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.category');
    }
}
