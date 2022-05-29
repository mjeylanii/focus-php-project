<?php

namespace app\core;

use app\models\Product;
use app\models\User;

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


    public static function findOne($where, $model) //[user_email => mo@gmail.com, user_firstname => Jeylani]
    {
        $class = new $model();
        $tableName = $class->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);/*Return the instance of the calling class (fetchObject returns object by  default))*/
    }

    public static function getAll($class)
    {
        $class = new $class();
        $tableName = $class->tableName();
        /* $attributes = array_keys($where);*/
        $stmt = self::prepare("SELECT * FROM $tableName");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function delete($where, $model)
    {
        $class = new $model();
        $tableName = $class->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("DELETE FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        return $stmt->execute();
    }

    public static function update($wherecol, $where, $model) //[user_email => mo@gmail.com, user_firstname => Jeylani]
    {
        $class = new $model();
        $tableName = $class->tableName();
        $attributes = array_keys($where);
        $column = array_keys($wherecol);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $sqlcol = implode(array_map(fn($col) => "$col = :$col", $column));
        $stmt = self::prepare("UPDATE $tableName SET $sqlcol WHERE $sql");
        foreach ($wherecol as $key => $item){
        $stmt->bindValue(":$key", $item);
    }
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }

            $stmt->execute();
           return $stmt->fetchObject(static::class);/*Return the instance of the calling class (fetchObject returns object by  default))*/
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }


}