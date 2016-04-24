<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DCN\RBAC\Traits\HasRoleAndPermission;
use DCN\RBAC\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements  HasRoleAndPermissionContract {

    use HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
