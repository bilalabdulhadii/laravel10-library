<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        if($settings === null)
        {
            $settings = new Setting();
            $settings->title = 'Project title';
            $settings->save();
            $settings = Setting::first();
        }
        return view('admin.settings', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $data = Setting::find($id);

        if ($request->input('default_settings')) {
            $data->delete();
            $settings = new Setting();
            $settings->title = 'Project title';
            $settings->save();
            return redirect()->route('admin.settings');
        }
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->smtpserver = $request->input('smtpserver');
        $data->smtpemail = $request->input('smtpemail');
        $data->smtppassword = $request->input('smtppassword');
        $data->smtpport = $request->input('smtpport');
        $data->references = $request->input('references');
        $data->about = $request->input('about');
        $data->facebook = $request->input('facebook');
        $data->youtube = $request->input('youtube');
        $data->linkedin = $request->input('linkedin');
        $data->twitter = $request->input('twitter');
        $data->status = $request->input('status');
        if ($request->del_icon) {
            if ($data->icon) {
                Storage::delete($data->icon);
                $data->icon = null;
            }
        } else {
            if ($request->file('icon')) {
                if ($data->icon) {
                    Storage::delete($data->icon);
                }
                $data->icon = $request->file('icon')->store('image');
            }
        }
        $data->save();
        return redirect()->route('admin.settings');
    }
}
