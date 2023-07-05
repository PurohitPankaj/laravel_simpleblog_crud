<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  protected function credentials(Request $request)
  {
    //check if comming request email field contains mobile number or not, If yes then login with mobile and return.
    if (is_numeric($request->get('email'))) {
      return ['mobile' => $request->get('email'), 'password' => $request->get('password')];
    }
    //If not mobile number then use default username() is email 
    return $request->only($this->username(), 'password');
  }

  /**
   * Log the user out of the application.
   * Note: To redirect user after logout, 
   * we set to login page by overriding default method used in AuthenticatesUsers
   */

  public function logout(Request $request)
  {
    $this->guard()->logout();
    $request->session()->flush();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
