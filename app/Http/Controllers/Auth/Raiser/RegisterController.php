<?php

namespace App\Http\Controllers\Auth\Raiser;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Logo;
use App\Info;
use App\Raiser;
use App\Event;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        
        $this->middleware('guest:raiser');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function showRaiserRegisterForm()
    {
        $logo = Logo::first();
        $info = Info::first();
        $galleries = Event::where('is_approved',true)->orderBy('created_at','desc')->take(6)->get();
        return view('auth.raiser.register', ['url' => 'raiser'],compact('logo','galleries','info'));
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }



    protected function createRaiser(Request $request)
    {
        $this->validator($request->all())->validate();

        if($request->hasfile('image')){
            
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $folder="images/raiser/";
            $file->move($folder,$filename);
            $imageUrl=$folder.$filename;

}
        $raiser = Raiser::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'bkashphone_no' => $request['bphone_no'],
            'rocketphone_no' => $request['rphone_no'],
            'address' => $request['address'],
            'image' => $imageUrl,
            'password' => Hash::make($request['password']),
        ]);
        Toastr::success('Raiser Successfully Registered:)Please Login Now','Success');
        
        return redirect()->intended('/login/raiser');
    }

}
