<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data =Faq::all();
        return view('admin.faq.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.faq.create', [
            'settings' => $settings,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Faq();
        $data->subject = $request->subject;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.faq');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Faq::find($id);
        return view('admin.faq.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = Faq::find($id);
        return view('admin.faq.edit', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Faq::find($id);
        $data->subject = $request->subject;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.faq');
    }

    public function destroy($id)
    {
        $data =Faq::find($id);
        $data->delete();
        return redirect()->route('admin.faq');
    }
}
