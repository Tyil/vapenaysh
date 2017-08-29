<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PickAuthRequest;
use App\Http\Requests\PickUsernameRequest;
use App\User;
use DB;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
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

    private $socialDrivers = [
        'facebook' => 'Facebook',
        'google' => 'Google',
        'github' => 'Github',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('pages.auth.login', [
            'socialDrivers' => $this->socialDrivers,
        ]);
    }

    public function loginFinish(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function registerAuth(PickUsernameRequest $request)
    {
        session()->flash('register.name', $request->input('name'));

        return view('pages.auth.set-auth', [
            'socialDrivers' => $this->socialDrivers,
        ]);
    }

    public function registerFinish(PickAuthRequest $request)
    {
        if (!session()->has('register.name')) {
            return redirect()->route('register');
        }

        DB::transaction(function () use ($request) {
            $user = new User();

            $user->name = session('register.name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            auth()->login($user);
        });

        return redirect()->route('home');
    }
}
