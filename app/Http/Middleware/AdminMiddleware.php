<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Http\Request;

class AdminMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->type == 'student') {
        //     return $next($request);
        // }
        if ($this->auth->check() && $this->auth->user()->type === 'admin') {
            return $next($request);
        }
    
        return redirect('/');
    }
}


