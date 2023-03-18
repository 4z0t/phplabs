<?php

namespace App\Classes;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;


use App\Classes\IValidator;


class UserValidator extends IValidator
{
    public static function constrains(): array
    {
        return [
            "name" => [new NotBlank(), new Length(["min" => 1,])],
            "mail" => [new NotBlank(), new Length(["min" => 1,])],
        ];
    }
}
