<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    public string $title;

    public function __construct($title)
    {
        $this->title = config('app.name') ." | ". $title;
    }

    public function render(): View
    {
        return view('layouts.main');
    }
}
