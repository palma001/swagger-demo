<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Condominium extends Base
{
	/**
	 * @OA\Schema(
	 *   schema="Condominium",
	 *   type="object",
	 *   @OA\Property(
	 *       property="name",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium name"
	 *   ),
	 *   @OA\Property(
	 *       property="phone",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium phone"
	 *   ),
	 *   @OA\Property(
	 *       property="email",
	 *       required={"true"},
	 *       type="string",
	 *       description="The Condominium email"
	 *   ),
	 *   @OA\Property(
	 *       property="type_condominium",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium type_condominium"
	 *   ),
	 *   @OA\Property(
	 *       property="active_indicator",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium active_indicator"
	 *   ),
	 *   @OA\Property(
	 *       property="create_by",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium create_by"
	 *   ),
	 *   @OA\Property(
	 *       property="update_by",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Condominium update_by"
	 *   ),
	 * )
	 */
    protected $table = 'condominiums';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    public static $filterable = [
        'user_id',
        'name',
        'last_name',
        'phone',
        'email',
        'type_condominium',
        'active_indicator'
    ];
    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(CondominiumRolUser::class);
    }
}
