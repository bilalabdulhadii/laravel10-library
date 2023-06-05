<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LoanController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $data = Loan::all();
        return view('admin.loan.index', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function create()
    {
        $settings = Setting::first();
        $users = User::all();
        $books = Book::all();
        return view('admin.loan.create', [
            'settings' => $settings,
        ], compact('books', 'users'));
    }

    public function store(Request $request)
    {
        /*
        // validate user_name
        $validatedData = $request->validate([
            'user_name' => 'required|string',
        ]);
        // find if the user_name is exists or not
        $user = User::where('name', $validatedData['user_name'])->first();
        // return wrong message if not exists
        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' => 'There is no user named "'.$request->user_name.'"']);
        }*/

        // if everything right store the data
        $data = new Loan();
        $data->user_id = $request->user_id;
        $data->book_id = $request->book_id;
        $data->save();
        return redirect()->route('admin.loan');
    }

    public function show($id)
    {
        $settings = Setting::first();
        $data = Loan::find($id);
        return view('admin.loan.show', [
            'data' => $data,
            'settings' => $settings,
        ]);
    }

    public function edit($id)
    {
        $settings = Setting::first();
        $data = Loan::find($id);
        $users = User::all();
        $books = Book::all();
        return view('admin.loan.edit', [
            'data' => $data,
            'settings' => $settings,
        ], compact('users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $data = Loan::find($id);

        // if everything right update the data
        $data->user_id = $request->user_id;
        $data->book_id = $request->book_id;
        $data->save();
        return redirect()->route('admin.loan');
    }

    public function return($id)
    {
        $data = Loan::find($id);
        $data->return_date = Carbon::now();
        $data->status = "Returned";
        $data->save();
        return redirect()->route('admin.loan');
    }

    public function active($id)
    {
        $data = Loan::find($id);
        $dueDate = Carbon::now()->addDays(15)->toDateString();
        $data->due_date = $dueDate;
        $data->status = "Active";
        $data->save();
        return redirect()->route('admin.loan');
    }

    public function destroy($id)
    {
        $data =Loan::find($id);
        $data->delete();
        return redirect()->route('admin.loan');
    }
}
