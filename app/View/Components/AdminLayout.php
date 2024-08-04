<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public string $title;

    public function __construct($title = null)
    {
        $this->title = $title ?? config('app.default_title');
    }
    public function render(): View
    {
        return view('layouts.admin.app');
    }
}
