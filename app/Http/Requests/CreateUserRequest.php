<?php

namespace App\Http\Requests;

use App\Rules\ValidGender;

class CreateUserRequest extends GeneralRequest
{
    private $nicknameParam = 'nickname';
    private $nameParam = 'user_name';
    private $surnameParam = 'last_name';
    private $avatarParam = 'avatar';
    private $genderParam = 'gender_type';
    private $phoneNumberParam = 'phone_number';
    private $acceptMailingParam = 'accept_mailing';

    function getData(): array
    {
        return [
            'nick' => request($this->nicknameParam),
            'name' => request($this->nameParam),
            'surname' => request($this->surnameParam),
            'avatar' => request($this->avatarParam),
            'gender_type' => request($this->genderParam),
            'phone_number' => request($this->phoneNumberParam),
            'accept_mailing' => request($this->acceptMailingParam)
        ];
    }

    public function rules()
    {
        return [
            $this->nicknameParam => ['bail', 'required', 'min:5', 'max:100', 'unique:users,nickname'],
            $this->nameParam => ['bail', 'required', 'min:3', 'max:255'],
            $this->surnameParam => ['bail', 'required', 'min:3', 'max:255'],
            $this->avatarParam => [
                'bail',
                'nullable',
                'image',
                'mimes:png,jpg,jpeg,gif',
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'max:4096'
            ],
            $this->genderParam => ['bail', 'required', 'integer', new ValidGender],
            $this->phoneNumberParam => ['bail', 'required', 'min:5', 'max:32', 'phone:RU,UA,BY', 'unique:users,phone_number'],
            $this->acceptMailingParam => ['bail', 'nullable', 'boolean']
        ];
    }
}
