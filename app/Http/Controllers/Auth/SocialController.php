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
                $socialUser = new SocialUser();
                $socialUser->user_id = 0;
                $socialUser->provider = $driver;
                $socialUser->remote_id = $providerUser->getId();
                $socialUser->save();
            }

            $user = User::where('email', $providerUser->getEmail())
                ->first()
                ;

            // Check if user has an account here already
            if ($user === null) {
                $user = new User();
                $user->email = $providerUser->getEmail();
                $user->name = $providerUser->getName();
                $user->password = '';
                $user->save();

                // Link the new User to the SocialUser
                $socialUser->user_id = $user->id;
                $socialUser->save();
            }

            // Log the user in
            auth()->login($user);

            DB::commit();

            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
