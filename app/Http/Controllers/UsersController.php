<?php
BracketHighlighter 

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
    *   @OA\Parameter(
    *       name="paginate",
    *       allowEmptyValue=true,
    *       in="query",
    *       description="paginate",
    *       required=false,
    *       @OA\Schema(
    *           title="Paginate",
    *           example="true",
    *           type="boolean",
    *           description="The unique identifier of a Post resource"
    *       )
    *   ),
    *   @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       allowEmptyValue=true,
    *       description="Post resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortField",
    *       in="query",
    *       allowEmptyValue=true,
    *       description="Sort field",
    *       required=false,
    *       @OA\Schema(
    *           title="name",
    *           type="string",
    *           example="name",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="Sort order field",
    *       allowEmptyValue=true,
    *       @OA\Schema(
    *           title="sortOrder",
    *           example="asc",
    *           type="string",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="perPage",
    *       in="query",
    *       allowEmptyValue=true,
    *       description="Sort order field",
    *       @OA\Schema(
    *           title="perPage",
    *           type="number",
    *           default="0",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=200,
    *       description="A list with Users",
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=401,
    *       description="Unauthenticated."
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response="default",
    *       description="an ""unexpected"" error"
    *   ),
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
