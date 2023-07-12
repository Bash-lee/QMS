<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    private $action = 'management/user/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.tableManage')->with([
            'users'=>$user
        ]);
        // $user = User::all();
        // return view('user.tableManage')->with([
        //     'users' => $user
        // ]);
    }

    public function create()
    {
        return view('user.form')->with([
            'method' => 'POST',
            'action' => $this->action
        ]);
    }
    public function signup()
    {
        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|max:1'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 3
        ]);

        return redirect($this->action);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()

            ],422);
        }else{

           $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => 3
            ]);
            if($user){
                return response()->json([
                    'status'=>200,
                    'message'=>"User registerd successfully"

                ],200);
            }else{

                return response()->json([
                    'status'=>500,
                    'message'=>"something is wrong"

                ],500);

            }

        }

    }
    public function login(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
         ]);

         if(auth()->attempt($formFields)){
            $user = User::where('email', $request->input('email'))->first();
            return response()->json([
                'message'=>"user logged in",
                'data'=>$user
            ],200);
         }

          return response()->json([
            'status'=>422,
            'errors'=>"invalid credentials"

        ],422); ;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('user.form')->with([
                'method' => 'PUT',
                'action' => $this->action . $id,
                'user' => $user
            ]);
        }
        return redirect($this->action);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id . ',user_id',
                'role' => 'required|max:1'
            ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role');
            $user->save();
        }
        return redirect($this->action);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['errors' => null]);
        }

        return response()->json(['errors' => 'The selected id is invalid.']);
    }
    //
}
