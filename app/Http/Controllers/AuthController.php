<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        $user = User::where([
          "email" => $request->email,
        ])->first();

        if (!$user) {
          return response()->json([
            "message" => "Unauthorized",
            "status" => 401,
          ], 200);
        }

        $check = Hash::check($request->password, $user->password);

        if ($check) {
          $token = auth()->attempt($credentials);
          return response()->json([
            "token" => $token,
            "message" => "Successfully Logged In",
            "status" => 200,
          ], 200);
        }

        return response()->json([
          "message" => "Unauthorized",
          "status" => 401,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        $user = auth()->user();
        return response()->json($user, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
