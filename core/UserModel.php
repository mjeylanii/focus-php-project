<?php

namespace app\core;

abstract class UserModel extends DbModel
{

    abstract public function getDisplayName(): string;
    abstract public function getType(): int;
    abstract public function getStatus(): string;
    abstract public function getDate(): string;
    abstract public function getEmail(): string;
    abstract public function getFullName(): string;
    abstract public function deleteUser($where): bool;

}