<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        // switch (Auth::user()->role) {
        //     case 2:
        //         $this->redirectTo = '/home';
        //         return $this->redirectTo;
        //         break;
        //     case 4:
        //         $this->redirectTo = '/team';
        //         return $this->redirectTo;
        //         break;
        //     case 3:
        //         $this->redirectTo = '/player';
        //         return $this->redirectTo;
        //         break;
        //     case 5:
        //         $this->redirectTo = '/academy';
        //         return $this->redirectTo;
        //         break;
        //     case 6:
        //         $this->redirectTo = '/scout';
        //         return $this->redirectTo;
        //         break;
        //     case 1:
        //         $this->redirectTo = '/superadmin';
        //         return $this->redirectTo;
        //         break;
        //     default:
        //         $this->redirectTo = '/login';
        //         return $this->redirectTo;
        // }
        $this->redirectTo = '/login';
        return $this->redirectTo;

        // return $next($request);
    }
}
