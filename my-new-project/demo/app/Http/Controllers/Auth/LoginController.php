<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\MenuController;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
      $data = array(
        'menus' => (new MenuController())->getList()
      );
      return view('auth.login',$data);
    }
    public function _loginSubmit(Request $request){
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      if(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
        return Auth::user()->id;
      }
      return -1;
    }
    public function logout()
    {
      Auth::logout();
      return redirect()->route('login');
    }
}
