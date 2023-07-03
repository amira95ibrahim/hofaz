<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }



    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $findUser = User::where('social_id', $user->id)->first();

            if ($findUser) {

                Auth::login($newUser);

                return redirect()->intended('/');

            } else {
                $newUser = User::create([

                    'name' => $user->name,

                    'social_id' => $user->id,

                    'email' => null,

                    'social_type' => 'facebook',

                    'avatar' => $user->avatar,

                    'password' => encrypt('my-facebook')
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
