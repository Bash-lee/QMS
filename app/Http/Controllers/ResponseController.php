<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($succcess, $message, $code, $data = null)
    {
        return response()->json([
            "success" => $succcess, "messsage" => $message, "data" => $data
        ], $code);
    }
}
