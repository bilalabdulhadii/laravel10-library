<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function guest_layout()
    {
        $data = Setting::first();
        return view('layout.guest', [
            'data' => $data,
        ]);
    }

    public function loan($id)
    {
        $data = Loan::find($id);
        $data->return_date = Carbon::now();
        $data->status = "Returned";
        $data->save();
        return redirect()->route('dashboard');
    }
}
