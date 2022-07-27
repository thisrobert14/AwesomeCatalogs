<?php

namespace App\Actions\User;

use App\DataTransferObjects\UserData;
use App\Models\User;

class CreateUserAction
{
    public function create(UserData $data): User
    {
        $user = new User();
        $user->first_name = $data->firstName;
        $user->last_name = $data->lastName;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);

        $user->save();

        return $user;
    }
}