<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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
    public function loginclient(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'level' => 'Client' ], $request->get('remember'))) {    
            return redirect('/home');
        }
        Session::flash('err','email or Password incorrect!');
        return back()->withInput($request->only('email', 'remember'))->with('err','email or Password incorrect!');
    }
    public function clientLogout(Request $request)
    {
        Auth::guard('client')->logout();
        //$request->session()->forget('cart');
        //$request->session()->flush();
        return redirect('/home');
    }
}
