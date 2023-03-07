<?php

namespace Classes;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;


abstract class IValidator
{
    private ValidatorInterface $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public abstract static function constrains(): array;

    public function validate(mixed $var)
    {
        $errors = [];
        foreach ($this->constrains() as $field => $constrains) {
            $errors[] = $this->validator->validate($var->$field, $constrains);
        }
        return $errors;
    }
}
