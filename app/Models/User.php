<?php

namespace App\Models;

use App\Models\Condominium;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @OA\Schema(
 *   schema="Login",
 *   type="object",
 *   @OA\Property(
 *       property="email",
 *       required={"true"},
 *       type="string",
 *       description="The Users email"
 *   ),
 *   @OA\Property(
 *       property="password",
 *       type="string",
 *       required={"true"},
 *       description="The email password"
 *   ),
 * )
 */

/**
 * @OA\Schema(
 *   schema="User",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The user name"
 *   ),
 *   @OA\Property(
 *       property="lastname",
 *       type="string",
 *       required={"true"},
 *       description="The user lastname"
 *   ),
 *   @OA\Property(
 *       property="documents",
 *       type="string",
 *       required={"true"},
 *       description="The user documents"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       required={"true"},
 *       type="string",
 *       description="The Users email"
 *   ),
 *   @OA\Property(
 *       property="phone",
 *       type="string",
 *       required={"true"},
 *       description="The Users phone"
 *   ),
 *   @OA\Property(
 *       property="password",
 *       type="string",
 *       required={"true"},
 *       description="The Users password"
 *   ),
 * )
 */

class User extends Base implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'api_token',
        'remember_token',
        'updated_at',
        'created_at'
    ];
    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    public static $filterable = [
        'username',
        'email'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    //Relationships
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'condominium_rol_users', 'user_id', 'rol_id')
            ->using(CondominiumRolUser::class);
    }

    public function condominiums()
    {
        return $this->belongsToMany(Condominium::class, 'condominium_rol_users', 'user_id', 'condominium_id')
            ->using(CondominiumRolUser::class);
    }
}
