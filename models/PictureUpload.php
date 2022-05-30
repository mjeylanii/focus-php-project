<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;

class PictureUpload extends DbModel
{
    public int $img_id = 0;
    public string $img_adress = '';
    public int $user_id = 0;


    public function save()
    {
        $this->img_id = random_int(4000, 10000);
        $this->user_id = Application::$app->session->get('user');
        return parent::save();
    }

    public function tableName(): string
    {
        return 'images';
    }

    public function attributes(): array
    {
        return ['img_id', 'img_adress', 'user_id'];
    }

    public function primaryKey(): string
    {
        return 'img_id';
    }

    public function rules(): array
    {
        return [];
    }

    public static function fileUpload()
    {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            header("location: messages.php?islem=6");
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if (empty($errors) == true) {
            if(move_uploaded_file($file_tmp, "uploads/" . $file_name)){
            }

            return true;
        } else {
            print_r($errors);
        }
        return false;

    }
}