<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
class Module extends Model
{
    use SoftDeletes;
    // Relationships
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'module_permission', 'module_id', 'permission_id')
            ->using(ModulePermission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'module_rols', 'module_id', 'role_id')
            ->using(ModuleRol::class)
            ->withPivot([
                'permissions'
            ]);
    }

    public function permissionsByModule()
    {
        return $this->hasMany(ModuleRol::class, 'module_id', 'id');
    }
}
