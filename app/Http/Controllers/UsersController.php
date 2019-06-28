<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
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
        if ($request->paginate) {
            $users =  new UsersCollection(User::latest()->orderBy($request->sortField, $rquest->sortOrder)->paginate($request->rowsPerPage));
            if ($users) {
                return $users;
            } else {
                return response()->json(['msj' => 'Error al listar'], 500);
            }
        } else {
            $users =  new UsersCollection(User::all());
            if ($users) {
                return $users;
            } else {
                return response()->json(['msj' => 'Error al listar'], 500);
            }
        }
    }
}
