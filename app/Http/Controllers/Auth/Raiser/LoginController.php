<?php

namespace App\Http\Controllers\Auth\Raiser;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Logo;
use App\Info;
use App\Event;
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
        
        $this->middleware('guest:raiser')->except('logout');
    }



    public function showRaiserLoginForm()
    {
        $logo = Logo::first();
        $info = Info::first();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        return view('auth.raiser.login', ['url' => 'raiser'],compact('logo','galleries','info'));
    }

    public function raiserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('raiser')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            //return redirect()->intended('/admin');

            Toastr::success('Raiser Successfully Loggedd In :)','Success');
            return redirect()->route('raiser.dashboard');


        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('raiser')->logout();
        Toastr::success('Raiser Successfully Loggedd Out Login Again :)','Success');
        return redirect()
            ->route('raiser.login')
            ->with('status','Raiser has been logged out!');
    }

}
