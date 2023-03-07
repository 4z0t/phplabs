<?php

namespace Classes;

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    #[Assert\NotBlank]
    public string $name;

    #[Assert\NotBlank]
    public string $mail;

    public function __construct(string $name, string $mail)
    {
        $this->name = $name;
        $this->mail = $mail;
    }
}
