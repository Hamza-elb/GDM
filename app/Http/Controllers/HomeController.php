<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {
        $type = 'student';
        return view('auth.login',compact('type'));
    }
    public function admin()
    {
        $type = 'admin';
        return view('auth.login',compact('type'));
    }


    public function dashboard()
    {

        return view('dashboard');
    }

    public function dashboard_student()
    {

        return view('empty');
    }

//    public function out(Request $request){
//
//            if($request->name == 'Ensao.ump.ac.ma') {
//                Auth::logout();
//                $request->session()->invalidate();
//                $request->session()->regenerateToken();
//                return redirect('home');
//            }
//            else
//
//                Auth::logout();
//                $request->session()->invalidate();
//                 $request->session()->regenerateToken();
//                  return redirect('home');
////
////            Auth::guard()->logout();
////            $request->session()->invalidate();
////
////            $request->session()->regenerateToken();
////
////
////
////            return redirect('/');
//
//
//    }










//    public function admin()
//    {
//        $type = 'admin';
//        return view('auth.login',compact('type'));
//    }
//
//    public function register()
//    {
//        return view('auth.register');
////    }
//
//    public function dashboard()
//    {
//        return view('dashboard');
//    }



}
