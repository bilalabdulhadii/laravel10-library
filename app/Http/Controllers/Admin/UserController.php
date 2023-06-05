<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data = User::all();
        return view('admin.user.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.user.create', [
            'settings' => $settings,
        ]);
    }

    public function store(Request $request)
    {
        // validate user_email
        $validatedData = $request->validate([
            'email' => 'required|string',
        ]);
        // Check if the entered user_email already exists among other emails
        $user = User::where('email', $validatedData['email'])->first();
        // return error message if the user_email already exists
        if ($user) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered email "'.$request->email.'" already exists, please use another email']);
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->gender = $request->input('gender', null);
        $data->birth_date = $request->birth_date;
        if ($request->file('image')) {
            $data->profile_photo_path = $request->file('image')->store('image');
        }
        $data->save();
        return redirect()->route('admin.user');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = User::find($id);
        return view('admin.user.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = User::find($id);
        return view('admin.user.edit', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        // validate user_email
        $validatedData = $request->validate([
            'email' => 'required|string',
        ]);
        // Check if the entered user_email already exists among other emails (excluding the current email)
        $user = User::where('email', $validatedData['email'])
            ->where('id', '!=', $data->id)
            ->first();
        // return error message if the user_email already exists
        if ($user) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered email "'.$request->email.'" already exists, please use another email']);
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->gender = $request->input('gender', null);
        $data->birth_date = $request->birth_date;

        if ($request->del_image) {
            Storage::delete($data->profile_photo_path);
            $data->profile_photo_path = null;
        } else {
            if ($request->file('image')) {
                if ($data->profile_photo_path)
                {
                    Storage::delete($data->profile_photo_path);
                }
                $data->profile_photo_path = $request->file('image')->store('image');
            }
        }

        $data->save();
        return redirect()->route('admin.user');
    }

    public function destroy($id)
    {
        $data =User::find($id);
        if ($data->profile_photo_path) {
            Storage::delete($data->profile_photo_path);
        }
        $data->delete();
        return redirect()->route('admin.user');
    }
}
