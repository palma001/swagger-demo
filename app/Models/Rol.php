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
            ->using(CondominiumRolUser::class);
    }

    public function condominiums()
    {
        return $this->belongsToMany(Condominium::class, 'condominium_rol_users', 'user_id', 'condominium_id')
            ->using(CondominiumRolUser::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_rols')
            ->using(ModuleRol::class)
            ->withPivot([
                'permissions'
            ]);
    }

    public function moduleRol()
    {
        return $this->hasMany(ModuleRol::class, 'rol_id', 'id');
    }
}
