<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';

    public function users() {
        // works convention about 3rd table and connecting field names
        return $this->belongsToMany('App\User');
    }
}
