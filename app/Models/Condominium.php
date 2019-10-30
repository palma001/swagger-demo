<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condominium extends Base
{
	/**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'condominium_id';
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
}
