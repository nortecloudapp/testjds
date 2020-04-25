<?php

namespace App\Providers;

use App\Http\ViewComposers\UseripComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(
            ['auth.login', 'tekio'],
            UseripComposer::class
        );
    }
}
