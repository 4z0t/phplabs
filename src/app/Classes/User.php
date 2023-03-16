<?php

namespace App\Classes;

use DateTime;

class User
{
    public readonly DateTime $creationTime;

    public function __construct(public readonly string $name, public readonly string $mail)
    {
        $this->creationTime = new DateTime('now');
    }
}
