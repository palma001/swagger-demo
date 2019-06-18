<?php

namespace App\Http\Controllers;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        //
    }

  /**
    * @OA\Get(
    *   path="/users",
    *   summary="Lists available Users",
    *   description="Gets all available Users resources",
    *   tags={"Users"},
    *   security={{"passport": {"*"}}},
    *   @OA\Response(
    *   @OA\MediaType(mediaType="application/json"),
    *   response=200,
    *   description="A list with Users",
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
        $user = new User:all();
        if ($users) {
            return response()->json($user, 200);
        } else {
            return response()->json(['msj' => 'Error al listar'], 500);
        }
    }
}
