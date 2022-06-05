<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
      }else{
          return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
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


    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ]);

        $student = new Admin();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $save = $student->save();

        if($save) {
            return redirect('/student/dashboard');
        }else{
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement');
        }

    }



}
