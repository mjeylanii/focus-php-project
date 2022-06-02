<?php

namespace app\models;

class Message extends \app\core\MessageModel
{
    const STATUS_UNREAD = 'NOT READ';
    const STATUS_READ = 'READ';
    public int $message_id = 0;
    public string $message_name = '';
    public string $message_email = '';
    public string $message_phone = '';
    public string $message_txt = '';
    public string $message_status = '';

    public function save()
    {
        $this->message_status = self::STATUS_UNREAD;
        return parent::save();
    }

    public function tableName(): string
    {
        return 'messages';
    }

    public function primaryKey(): string
    {
        return 'message_id';
    }

    public function rules(): array
    {
        return [
            'message_name' => [self::RULE_REQUIRED,],
            'message_email' => [self::RULE_REQUIRED],
            'message_txt' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ['message_name', 'message_email', 'message_phone', 'message_txt', 'message_status'];
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function getProductName(): string
    {
        return $this->message_name;
    }

    public function getMessageTxt(): string
    {
        return $this->message_txt;
    }



    public function getAllMessages(): array
    {
        return self::getAll(self::class);
    }


    public function deleteMessage($where): bool
    {

        return self::delete($where, self::class);
    }

    public function setMessage($where): bool
    {
        $this->message_status = self::STATUS_READ;
        $wherecol = [
            'message_status' => self::STATUS_READ,
        ];
        return self::update($wherecol, $where, self::class) ?? false;
    }
}