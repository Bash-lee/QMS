<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    //

    /**
     * Where to redirect users after login.
     *
     *
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     *
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginForm(){
        return view('Auth.login');
    }

    public function login(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
         ]);

         if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
         }

         return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');


    }

     public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }

}
