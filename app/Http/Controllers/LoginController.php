<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  /**
    * @OA\Post(
    *   path="/login",
    *   summary="Login",
    *   description="Login Users",
    *   tags={"Users"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *   @OA\MediaType(
    *       mediaType="application/json",
    *       @OA\Schema(ref="#/components/schemas/Users")
    *   )
    *   ),
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response=200,
    *   description="The Post resource created",
    *   ),
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response=401,
    *   description="Unauthenticated."
    *   ),
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response="default",
    *   description="an ""unexpected"" error",
    *   )
    * )
    *
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request) {
        $user = User::where('email', $req->input('email') )->first();
        if(Hash::check($request->input('password'), $user->password)){
            $apikey = base64_encode(str_random(40));
            Users::where('email', $request->input('email'))->update(['api_key' => $apikey]);
            return response()->json(['status' => 'success','api_key' => $apikey]);
        }else{
          return response()->json(['status' => 'fail'], 401);
        }
    }
}
