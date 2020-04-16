<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends GeneralRequest
{
    private $loginParam = 'nickname';

    function getData(): array
    {
        return [
            'nick' => request($this->loginParam)
        ];
    }

    public function rules()
    {
        return [
            $this->loginParam => ['bail', 'required', 'min:5', 'max:100', 'exists:users,nickname']
        ];
    }
}
