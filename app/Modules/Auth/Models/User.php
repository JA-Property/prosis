<?php
namespace App\Modules\Auth\Models;
class User
{
    // If using an ORM like Eloquent or Doctrine, 
    // you'd define relationships. For example in Eloquent:
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function hasPermission($permissionName)
    {
        // Eloquent example: 
        return $this->permissions->contains('name', $permissionName);
    }
}
