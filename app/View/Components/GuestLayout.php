<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $settings = Setting::first();
        return view('layouts.guest', [
            'settings' => $settings,
        ]);
    }
}
