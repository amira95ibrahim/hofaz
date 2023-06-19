<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Add a debug statement to check if the request is reaching the login method
        // Log::debug('Login method called');

        // Retrieve the user's login credentials
        $credentials = $request->only('email', 'password');

        // Add a debug statement to check the credentials being used for authentication
        // Log::debug('Login credentials:', $credentials);

        if (auth()->attempt($credentials)) {
            
            // Authentication successful
            // Add a debug statement to check if the user is successfully authenticated
            // Log::debug('User authenticated successfully');
            $request->session()->regenerate();
            // dd(auth()->user());
            return redirect()->intended($this->redirectTo);
        }

        // Authentication failed
        // Add a debug statement to check if the user authentication failed
        Log::debug('User authentication failed');

        // Add custom logic for handling failed authentication (e.g., displaying error messages)
        // ...

        // Redirect back to the login page
        // ...
    }
}
