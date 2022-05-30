<?php

namespace app\core;

abstract class MessageModel extends DbModel
{
    abstract public function getAllMessages(): array;
    abstract public function getMessageTxt();
    abstract public function setMessage($where): bool;
    abstract public function deleteMessage($where): bool;
}