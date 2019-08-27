<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UsersCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
class UsersController extends Controller
{
    /**
     * validate data of request
     * @param  [Request] $request dta
     * @return [type]          [description]
     */
    private function validation ($request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'documents' => ['required', Rule::unique('users')->ignore($request->documents, 'documents')],
            'email' => ['email', 'required', Rule::unique('users')->ignore($request->documents, 'documents')],
            'phone' => 'required',
            'password' => 'required|min:8'
        ]);
        return $validator;
    }
   /**
        * @OA\Get(
        *   path="/users",
        *   summary="Lists available Users",
        *   description="Gets all available Users resources",
        *   tags={"Users"},
        *   security={{"passport": {"*"}}},
        *   @OA\Parameter(
        *       name="paginate",
        *       in="query",
        *       description="paginate",
        *       required=false,
        *       @OA\Schema(
        *           title="Paginate",
        *           example="true",
        *           type="boolean",
        *           description="The unique identifier of a User resource"
        *       )
        *   ),
        *   @OA\Parameter(
        *       name="dataSearch",
        *       in="query",
        *       description="User resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="The unique identifier of a User resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="sortField",
        *       in="query",
        *       description="Sort field",
        *       required=false,
        *       @OA\Schema(
        *           title="name",
        *           type="string",
        *           example="name",
        *           description="The unique identifier of a User resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="sortOrder",
        *       in="query",
        *       description="Sort order field",
        *       @OA\Schema(
        *           title="sortOrder",
        *           example="asc",
        *           type="string",
        *           description="The unique identifier of a User resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="perPage",
        *       in="query",
        *       description="Sort order field",
        *       @OA\Schema(
        *           title="perPage",
        *           type="number",
        *           default="0",
        *           description="The unique identifier of a Users resource"
        *       )
        *    ),
        * @OA\Parameter(
        *     name="authorization",
        *     in="header",
        *     description="authorization",
        *     @OA\Schema(
        *         title="authorization",
        *         type="string",
        *     )
        * ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="A list with Users",
        *       @OA\Header(
        *       header="X-Auth-Token",
        *       @OA\Schema(
        *           type="integer",
        *           format="int32"
        *       ),
        *       description="calls per hour allowed by the user"
        *     ),
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
    /**
        * @OA\Post(
        *   path="/users",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"Users"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/User")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The User resource created",
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=401,
        *       description="Unauthenticated."
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response="default",
        *       description="an ""unexpected"" error",
        *   )
        * )
        *
        * Store a newly created resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        *
        * @return \Illuminate\Http\Response
        */
    public function store(Request $request) {
        try {
            if ($this->validation($request)->fails()) {
                $errors = $this->validation($request)->errors();
                return response()->json($errors->all(), 201);
            } else {
                $user = new User;
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->documents = $request->documents;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->password = Hash::make($request->password);
                $user->api_token = null;
                $user->save();
                return response()->json($user, 201);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
    /**
        * @OA\Put(
        *   path="/users/{documents}",
        *   summary="Updates a Users resource",
        *   description="Updates a Users resource by the documents",
        *   tags={"Users"},
        *   security={{"passport": {"*"}}},
        *   @OA\Parameter(
        *   name="documents",
        *   in="path",
        *   description="User resource id",
        *   required=true,
        *   @OA\Schema(
        *       type="string",
        *       description="The unique identifier of a User resource"
        *   )
        *   ),
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/User")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *           response=200,
        *           description="The User resource updated"
        *       ),
        *       @OA\Response(
        *           @OA\MediaType(mediaType="application/json"),
        *           response=401,
        *           description="Unauthenticated."
        *       ),
        *       @OA\Response(
        *           @OA\MediaType(mediaType="application/json"),
        *           response="default",
        *           description="an ""unexpected"" error"
        *       )
        *   )
        *
        * Update the specified resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        * @param  int  $id
        *
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $id)
    {
        try {
            if ($this->validation($request)->fails()) {
                $errors = $this->validation($request)->errors();
                return response()->json($errors->all(), 201);
            } else {
                User::where('documents', $id)->update($request->all());
                return response()->json($request->all(), 201);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
