<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UsersCollection;
class UsersController extends Controller
{

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
    public function index(Request $request) {


        $q = User::select();

        $users = User::search($request->toArray(), $q);

        return  new UsersCollection($users);
    }
}
