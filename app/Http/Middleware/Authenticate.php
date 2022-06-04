<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/dashboard')) {
                return route('home');
            }
            if (Request::is(app()->getLocale() . '/student/dashboard')) {
                return route('home');
            }

            else {
                return route('home');
            }
        }
    }

}
