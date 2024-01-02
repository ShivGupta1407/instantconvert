<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Authcontroller extends Controller
{
    public function loadregister(){
        if(Auth::user() && Auth::user()->is_admin==1){
            return redirect('/admin/dashboard');
        }else if(Auth::user() && Auth::user()->is_admin==0){
            return redirect('/dashboard');
        }else{
            return view('register');
        }
    }
    public function userregister(Request $req){
        $req->validate([
            'name' => 'string|required|min:1',
            'email' => 'required|email|string|max:100|unique:users',
            'password' => 'string|required|min:6'
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return back()->with('success','Registered Succesfully!!');
    }

    public function loadlogin(){
        if(Auth::user() && Auth::user()->is_admin==1){
            return redirect('/admin/dashboard');
        }else if(Auth::user() && Auth::user()->is_admin==0){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function userlogin(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)){
         if (Auth::user()->is_admin == 1) {
            return redirect('/admin/universityindex');
         } else {
            return redirect('/dashboard');
         }
      } else {
         return back()->with('error', 'invalid credentials');
      }
   }

   public function admindash(){
    return view('admin.dashboard');
   }
   public function dash(){
    return view('user.dashboard');
   }
   public function logout(Request $req){
     $req->session()->flush();
     Auth::logout();
     return redirect('/');
   }
}

