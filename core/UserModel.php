<?php

namespace app\core;

abstract class UserModel extends DbModel
{

    abstract public function getDisplayName(): string;
    abstract public function getType(): int;

}