<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FrontController extends Controller
{
    public function header()
    {
        $settings = Setting::first();
        return view('front.header', [
            'settings' => $settings,
        ]);
    }

    public function sub_header()
    {
        $settings = Setting::first();
        return view('front.sub-header', [
            'settings' => $settings,
        ]);
    }

    public function footer()
    {
        $settings = Setting::first();
        return view('front.footer', [
            'settings' => $settings,
        ]);
    }

    public function index()
    {
        $settings = Setting::first();
        return view('front.index', [
            'settings' => $settings,
        ]);
    }

    public function about()
    {
        $settings = Setting::first();
        return view('front.about', [
            'settings' => $settings,
        ]);
    }

    public function contact()
    {
        $settings = Setting::first();
        return view('front.contact', [
            'settings' => $settings,
        ]);
    }

    public function services()
    {
        $settings = Setting::first();
        return view('front.services', [
            'settings' => $settings,
        ]);
    }

    public function faq()
    {
        $settings = Setting::first();
        $questions = Faq::all();
        return view('front.faq', [
            'settings' => $settings,
            'questions' => $questions,
        ]);
    }

    public function coming_soon()
    {
        $settings = Setting::first();
        return view('front.coming-soon', [
            'settings' => $settings,
        ]);
    }
}
