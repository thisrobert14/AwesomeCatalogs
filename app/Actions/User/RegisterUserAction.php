<?php

namespace App\Actions\User;

use App\DataTransferObjects\UserData;

class RegisterUserAction
{
    public function register(string $firstName, string $lastName, string $email, string $password)
    {
        $user = resolve(CreateUserAction::class)->create(new UserData(
            firstName: $firstName,
            lastName: $lastName,
            email: $email,
            password: $password
        ));

        return $user;
    }
}