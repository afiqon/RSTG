<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Flash;
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

     public function username()
    {
        return 'email';
    }

    public function credentials(Request $request)
    {
    return [
        'email' => $request->email,
        'password' => $request->password,
    ];
    }
    
    
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
       
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

       $email=Input::get('email');

 if ($this->guard()->attempt($credentials)) {

if(Auth::user()->email ==$email)
            {
                return redirect()->intended($this->redirectTo);
            }
            else
            {
          Session::flush();
            return Redirect::to('/')->with('error', 'NRIC/Passport.No is case sensitive.');
            }   

        }
        else{
               Flash::error("Incorrect email or password");
             return Redirect::to('/login');
        }
    }
}
