<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebLayout extends Component
{
    public function __construct()
    {
        //
    }
    public function render()
    {
        return view('themes.web.main');
    }
}
