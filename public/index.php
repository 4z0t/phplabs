<?php

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class User
{
    #[Assert\NotBlank]
    public $name;
    #[Assert\NotBlank]
    public $mail;

    public function __construct($name, $mail)
    {
        $this->name = $name;
        $this->mail = $mail;
    }
}

define('LARAVEL_START', microtime(true));



echo "Hello from PHP\n";
echo "ABOBA";



readfile("index.html");

$user1 = new User("Sasha", "Mail");
$user2 = new User("", "");




$validator = Validation::createValidator();
$errors1 = $validator->validate($user1);
$errors2 = $validator->validate($user2);

if (count($errors1)>0)
{
    $errstr = (string) $errors1;
    echo "1:$errstr";
}

if (count($errors2)>0)
{
    $errstr = (string) $errors2;
    echo "2:$errstr";
}