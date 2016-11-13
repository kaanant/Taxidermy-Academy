<?php

namespace App\Providers;

use App\Category;
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

        View::composer('site.*', function($view) use ($request){
            $view->with('categories', Category::all());

            $cost = 0;
            if (session('cart')) {
                $cost = array_sum(array_map(function($item){
                    return (float) $item['cost'];
                }, session('cart')));
            }

            $view->with('cartTotalCost', $cost);
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
