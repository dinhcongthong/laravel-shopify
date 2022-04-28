<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;

class AdminUser extends Administrator
{
    protected $fillable = [
        'username', 'password', 'name', 'avatar', 'id_myshopify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
