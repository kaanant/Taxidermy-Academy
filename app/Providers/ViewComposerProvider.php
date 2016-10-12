<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Request $request
     */
    public function boot(Request $request)
    {
        View::composer('*', function($view) use ($request){
            $view->with('request', $request);
            $view->with('currentUser', $request->user());
        });
    }

    /**
     * Register the application services.
     *
     */
    public function register()
    {

    }
}
