<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class UseripComposer
{
    public function compose(View $view)
    {
        // $programas = Programa::all();
        $userip = request()->ip();
        $view->with('userip', $userip);
    }
}
