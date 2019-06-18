<?php

namespace App\Http\Controllers;
use App\User;

class ExampleController extends Controller
{

    public function __construct()
    {
        //
    }

  /**
    * @OA\Get(
    *   path="/example",
    *   summary="Lists available Example",
    *   description="Gets all available Example resources",
    *   tags={"Example"},
    *   security={{"passport": {"*"}}},
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response=200,
    *   description="A list with Example",
    *   ),
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response=401,
    *   description="Unauthenticated."
    *   ),
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response="default",
    *   description="an ""unexpected"" error"
    *   )
    * )
    *
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        $user = new User();
        $user->name = "Luis Palma";
        $user->email = "palma@gmail.com";
        return response()->json($user, 200);
    }
}
