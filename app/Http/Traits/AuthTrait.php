<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
  public function checkGurded($request){

      if($request->type == 'student'){
          $this->validate($request, [
              'email' => 'required|email',
              'password' => 'required|min:6'
          ]);

          $gaurdName = 'web';
      }
      else{
          $this->validate($request, [
              'email' => 'required|email',
              'password' => 'required|min:6'
          ]);

          $gaurdName = 'admin';
      }
     return $gaurdName;
  }

    public function redirect($request){

        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
