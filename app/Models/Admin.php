<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = [];

    /****
     *  get all permission group
     */
    public static function getpermissionGroups()
    {
        $permission_group = DB::table('permissions')
                        ->select('group_name as name')
                        ->groupBy('group_name')
                        ->get();

        return $permission_group;
    }

    //get permission by group name
    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

     //role has permission
     public static function roleHasPermissions($role, $permissions)
     {
         $hasPermission = true;
         foreach($permissions as $permission){
             if(!$role->hasPermissionTo($permission->name)){
                 $hasPermission = false;
                 return $hasPermission;
             }
         }
         return $hasPermission;
     }

}
