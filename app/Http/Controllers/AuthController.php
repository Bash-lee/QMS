<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $res;

    public function __construct()
    {
        $this->res = new ResponseController();
    }

    /**
     * Display a profile
     */
    public function profile(Request $request)
    {
        return $this->res->__invoke(
            true, "Profile was retrieved.", 200, $request->user()
        );
    }

    public function users(Request $request)
    {
        $users = User::all();
        return $this->res__invoke(
            true,"users retrived.",200,$request->$users
        );



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
