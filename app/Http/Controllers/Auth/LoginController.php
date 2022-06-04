<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // use AuthenticatesUsers;

    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {

      if(Auth::guard($this->checkGurded($request))->attempt(['email' => $request->email, 'password' => $request->password])){
        return $this->redirectTo($request);
      }





    }
    public function logout(Request $request){
        if ($request->type == 'student') {
            Auth::guard('student')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');

        } else {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }

    }


//    public function loginAdmin()
//    {
//        $type = 'admin';
//        return view('auth.login', compact('type'));
//    }



}
