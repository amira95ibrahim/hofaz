<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use RedirectsUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Sign in a user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
        return $this->login($request);
    }


    /***
     *
     *
     *
     *
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }

    // public function redirectToFacebookProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }



    // public function handleFacebookProviderCallback()
    // {
    //     try {
    //         $user = Socialite::driver('facebook')->user();
    //         // Process user data and login the user
    //     } catch (\Exception $e) {
    //         // Log and handle any exceptions that occur during the login process
    //         return redirect()->route('login')->with('error', 'An error occurred during Facebook login');
    //     }

    //     // Redirect or perform any necessary actions after successful login
    // }


}
