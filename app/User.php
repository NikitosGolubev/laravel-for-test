<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    protected $attributes = [
        'avatar' => 'users/default.jpg'
    ];

    /* Accessors & Mutators  */

    public function getAvatarUrlAttribute() {
        return Storage::url($this->avatar);
    }

    /* Eloquent relationships */

    public function articles() {
        // works convention about 3rd table and connecting field names
        return $this->belongsToMany('App\Article');
    }
}
