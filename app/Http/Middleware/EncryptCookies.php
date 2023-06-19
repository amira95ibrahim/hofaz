<?php namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Support\Facades\Log;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Decrypt the cookies on the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    // public function handle($request, Closure $next)
    // {
    //     // Add a log statement to track the execution of the middleware
    //     Log::debug('EncryptCookies middleware executed');

    //     return parent::handle($request, $next);
    // }
}
