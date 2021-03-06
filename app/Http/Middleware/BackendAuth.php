<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseTrait;

class BackendAuth
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->checkAuth();

        return $next($request);
    }

    private function checkAuth()
    {
        if(empty(Auth::user())){
            echo $this->withUnauthorized();exit;
        }
    }
}
