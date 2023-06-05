<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data = Event::all();
        return view('front.events.index', [
            'settings' => $settings,
            'data' => $data,
        ]);
    }

    public function show(string $id)
    {
        $settings = Setting::first();
        $data = Event::find($id);
        return view('front.events.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }
}
