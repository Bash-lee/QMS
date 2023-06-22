<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    // protected function unauthenticated($request, array $guards)
    // {
    //     $res = new ResponseController();

    //     throw new HttpResponseException($res->__invoke(
    //         false, "Please login.", 401
    //     ));
    // }


}
