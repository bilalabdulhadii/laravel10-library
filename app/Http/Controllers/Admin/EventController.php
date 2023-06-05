<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data = Event::all();
        return view('admin.event.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.event.create', [
            'settings' => $settings,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Event();
        if (!$request->title) {
            $data->title = "Untitled Event";
        } else {
            $data->title = $request->title;
        }
        $data->content = $request->content_text;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.event');
    }

    public function show(string $id)
    {
        $settings = Setting::first();
        $data = Event::find($id);
        return view('admin.event.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit(string $id)
    {
        $settings = Setting::first();
        $data = Event::find($id);
        return view('admin.event.edit', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Event::find($id);
        $data->title = $request->title;
        $data->content = $request->content_text;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.event');
    }

    public function destroy(string $id)
    {
        $data =Event::find($id);
        $data->delete();
        return redirect()->route('admin.event');
    }
}
