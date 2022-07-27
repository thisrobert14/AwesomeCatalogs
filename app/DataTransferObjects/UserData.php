<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $firstName;

    public string $lastName;

    public string $email;

    public string $password;
}