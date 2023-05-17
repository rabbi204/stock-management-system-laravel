<?php

namespace App\Http\Controllers\Backend\Auth;

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
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(Request $request)
    {
         // validate Login data
         $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //atempt to login
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password' =>$request->password, 'status'=>1], $request->remember )){

            $notification = array(
                'message' => 'Successfully Logged In !',
                'alert-type' => 'success'
            );
            return redirect()->intended(route('admin.dashboard'))->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid email and password',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    /****
     * admin guard logout
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.login')->with($notification);
    }

}
