<?php

namespace App\Http\Controllers\ProjectManager\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::PROJECT_MANAGER_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:project_manager')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        return view('project_manager.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->invalidate();

        // return redirect()->route('admin.auth.login');
        return redirect(\URL::previous());
    }

    public function locked(Request $request) {
        if (\Auth::guard('project_manager')->check()) {
            $user = \Auth::guard('project_manager')->user();

            auth()->guard('project_manager')->logout();

            return view('project_manager.locked', compact('user'));
        } else {
            return redirect()->route('project_manager.login');
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($guard = 'project_manager') {
        return \Auth::guard($guard);
    }
}
