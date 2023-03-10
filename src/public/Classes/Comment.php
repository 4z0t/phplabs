<?php

use Classes\User;


class Comment
{
    public function __construct(public readonly User $user, public readonly string $text)
    {

    }
}
