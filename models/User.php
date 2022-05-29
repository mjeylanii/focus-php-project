<?php

namespace app\models;

use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 'INACTIVE';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_DELETED = 'DOES NOT EXIST';
    const USER_ADMIN = 1;
    const USER_NORMAL = 2;
    public int $user_id = 0;
    public string $user_firstname = '';
    public string $user_lastname = '';
    public string $user_email = '';
    public string $user_password = '';
    public string $passwordConfirm = '';
    public string $user_status = self::STATUS_INACTIVE;
    public int $user_type = self::USER_NORMAL;
    public string $registration_date;

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'user_id';
    }

    public function save()
    {
        $this->status = self::STATUS_DELETED;
        $this->type = self::USER_NORMAL;
        $this->user_id = rand(9999, 99998);
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'user_firstname' => [self::RULE_REQUIRED],
            'user_lastname' => [self::RULE_REQUIRED],
            'user_email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'user_password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 50]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'user_password']]
        ];
    }

    public function attributes(): array
    {
        return ['user_id', 'user_firstname', 'user_lastname', 'user_email', 'user_password', 'user_type', 'user_status'];
    }

    public function getDisplayName(): string
    {
        return $this->user_firstname ?? 'Guest';
    }

    public function getFullName(): string
    {
        return $this->user_firstname . ' ' . $this->user_lastname ?? 'Guest';
    }


    public function getType(): int
    {
        return $this->user_type;
    }

    public function getDate(): string
    {
        return $this->registration_date;
    }

    public function getStatus(): string
    {
        return $this->user_status;
    }

    public function getEmail(): string
    {
        return $this->user_email;
    }

    public function deleteUser($where): bool
    {
        return self::delete($where, self::class);
    }
}