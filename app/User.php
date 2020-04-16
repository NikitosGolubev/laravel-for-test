<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    protected $attributes = [
        'avatar' => 'storage/users/default.jpg'
    ];

    /* Eloquent relationships */

    public function articles() {
        // works convention about 3rd table and connecting field names
        return $this->belongsToMany('App\Article');
    }
}
