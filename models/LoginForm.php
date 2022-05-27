<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $user_email = '';
    public string $user_password = '';

    public function rules(): array
    {
        return [
            'user_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'user_password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = User::findOne(['user_email' => $this->user_email]);

        if (!$user) {
            $this->addError('user_email', 'This account does not exist');
            return false;
        }
        if (password_verify($this->user_password, $user->user_password)) {
            $this->addError('user_password', 'Wrong password or e-mail');
            return false;
        }

        return Application::$app->login($user); /*This is returned to the AuthController handleLogin method*/
    }


}