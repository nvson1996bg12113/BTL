<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm(){
      if(Auth::guard('admin')->check())
        return redirect()->route('admin.dashboard');
      return view('auth.admin_login');
    }
    public function login(Request $request){
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
        return redirect()->route('admin.dashboard');
      }
      return redirect()->route('admin.login');

      //return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login');
    }
}
