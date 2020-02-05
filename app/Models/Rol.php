<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rol extends Model
{
    use SoftDeletes;

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'condominium_rol_users', 'rol_id', 'user_id')
            ->using(CondominiumRolUser::class)/* 
            ->where('school_id', session('schoolId')) */;
    }

    public function condominiums()
    {
        return $this->belongsToMany(Condominium::class, 'condominium_rol_users', 'user_id', 'condominium_id')
            ->using(CondominiumRolUser::class);
    }
}
