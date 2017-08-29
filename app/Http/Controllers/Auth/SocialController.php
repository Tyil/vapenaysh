<?php

namespace App\Http\Controllers\Auth;

use DB;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SocialUser;
use App\User;

class SocialController extends Controller
{
    public function redirect(
        string $driver
    ) {
        if (session()->has('register.name')) {
            session()->keep('register.name');
        }

        return Socialite::driver($driver)->redirect();
    }

    public function callback(
        string $driver
    ) {
        try {
            DB::beginTransaction();

            $providerUser = \Socialite::driver($driver)->user();

            $socialUser = SocialUser::where('provider', $driver)
                ->where('remote_id', $providerUser->getId())
                ->first()
                ;

            // Create a new SocialUser
            if ($socialUser === null) {
                if (!session()->has('register.name')) {
                    return redirect()->route('auth.register');

                    // todo: add message telling user to register
                }

                $user = new User();
                $user->email = $providerUser->getEmail();
                $user->name = session('register.name');
                $user->password = '';
                $user->save();

                $socialUser = new SocialUser();
                $socialUser->user_id = $user->id;
                $socialUser->provider = $driver;
                $socialUser->remote_id = $providerUser->getId();
                $socialUser->save();
            }

            // Log the user in
            auth()->login($socialUser->user);

            DB::commit();

            return redirect()->intended(route('home'));
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
