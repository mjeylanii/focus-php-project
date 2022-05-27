<?php

namespace app\core;

abstract class DbModel extends Model
{


    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function save()
    {

        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $stmt = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }
        $stmt->execute();
        return true;
    }


    public static function findOne($where) //[user_email => mo@gmail.com, user_firstname => Jeylani]
    {

        $tableName = (new \app\models\User)->tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();

        return $stmt->fetchObject(static::class);/*Return the instance of the  User class (fetchObject returns object by  default))*/
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public function ifExists()
    {
        return $_SESSION;
    }

}