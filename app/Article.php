<?php

namespace App;

use App\Exceptions\MismatchException;
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

    // Я же могу поставить предопределение типа аргумента -> User $user
    public function isUserAuthor($user) {
        if (!($user instanceof User)) {
            throw new MismatchException('Вы можете передвавать в эту функцию только объекты класса User.');
        }

        if ($this->trashed()) return null; // если статья удалена
        return $user->articles()->exists($this); //  true если статья пренадлежит пользователю, false, если нет
    }
}
