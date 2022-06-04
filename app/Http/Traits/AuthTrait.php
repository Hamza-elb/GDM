<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{

    public function checkGurded($request)
    {
        if ($request->type == 'student') {
            $gaurdName = 'student';
        } else {
            $gaurdName = 'web';
        }
        return $gaurdName;
    }

    public function redirectTo($request)
    {

        if ($request->type == 'admin') {
            return redirect()->intended(RouteServiceProvider::HOME);

        } else {
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
    }
}

