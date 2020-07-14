<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest:admin')->except('logout');
    }



    public function showAdminLoginForm()
    {
        return view('auth.admin.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {


            Toastr::success('Admin Successfully Loggedd In :)','Success');
            return redirect()->route('admin.dashboard');


        }
        return back()->withInput($request->only('email', 'remember'));
    }


        public function logout()
        {
            Auth::guard('admin')->logout();
            Toastr::success('Admin Successfully Loggedd Out Login Again :)','Success');
            return redirect()
                ->route('admin.login')
                ->with('status','Admin has been logged out!');
        }

}
