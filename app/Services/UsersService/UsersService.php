<?php

namespace App\Services\UsersService;
use App\User;
use Illuminate\Support\Facades\Storage;
use Session;

class UsersService {
    const SESSION_USER_KEY = 'APP_USER';

    public function getFromLoginCredentials($data): User {
        return User::where('nickname', $data['nick'])->first();
    }

    public function create($data): User {
        $user = new User();

        $user->nickname = $data['nick'];
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->gender = $data['gender_type'];
        $user->phone_number = $data['phone_number'];
        $user->mailing_accepted = !!$data['accept_mailing'];

        if ($data['avatar']) {
            $user->avatar = $this->storeAvatar($data['avatar']);
        }

        $user->save();
        return $user;
    }

    public function isAuthenticated(): bool {
        return Session::has(self::SESSION_USER_KEY);
    }

    public function currentAuth() {
        if ($this->isAuthenticated()) {
            return Session::get(self::SESSION_USER_KEY);
        }

        return false;
    }

    public function remember(User $user) {
        Session::put(self::SESSION_USER_KEY, $user);
    }

    public function forget() {
        if ($this->isAuthenticated()) {
            Session::forget(self::SESSION_USER_KEY);
        }
    }

    final protected function storeAvatar($img): string {
        return Storage::disk('public')->put("users", $img);
    }

    final protected function removeAvatar($img) {
        Storage::disk('public')->delete($img);
    }
}
