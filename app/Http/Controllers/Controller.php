<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /*public function test() {
        $data = Test::first();
        return view('test', [
            'data' => $data,
        ]);
    }
    public function test_save(Request $request) {
        $data = Test::first();
        if($data->image) {
            Storage::delete($data->image);
        }
        $data->image = $request->file('image')->store('image');
        $data->save();
        return redirect('/test');
    }*/
}
