<?php

namespace App\Classes;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Validation;

abstract class IValidator
{
    private ValidatorInterface $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public abstract static function constrains(): array;

    public function validate(mixed $var): array
    {
        $errors = [];
        foreach ($this->constrains() as $field => $constrains) {
            $errors[$field] = $this->validator->validate($var->$field, $constrains);
        }
        return $errors;
    }
}
