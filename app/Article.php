<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function users() {
        // works convention about 3rd table and connecting field names
        return $this->belongsToMany('App\User');
    }
}
