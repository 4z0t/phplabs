<?php

namespace Classes;

use DateTime;

class User
{
    public readonly string $name;
    public readonly string $mail;
    public readonly DateTime $creationTime;

    public function __construct(string $name, string $mail)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->creationTime = new DateTime('now');
    }


}
