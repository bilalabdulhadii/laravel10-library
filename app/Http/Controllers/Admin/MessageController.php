<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = $request->ip();
        $data->save();
        return redirect()->back()->with('success', 'We got your message, you can check our reply from your dashboard');
    }

    public function index()
    {
        $settings = Setting::first();
        $data = Message::orderByRaw("status = 'New' desc, created_at desc")->get();

        return view('admin.message.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Message::find($id);
        if($data->status == "New")
        {
            $data->status = 'Read';
        }
        $data->save();
        return view('admin.message.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Message::find($id);
        if ($request->reply) {
            $data->reply = $request->reply;
            $data->status = "Replied";
        }
        $data->note = $request->note;
        $data->save();
        return redirect()->route('admin.message');
    }

    public function destroy($id)
    {
        $data =Message::find($id);
        $data->delete();
        return redirect()->route('admin.message');
    }
}
