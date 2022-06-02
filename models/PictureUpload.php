<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;
use app\core\FileUploadModel;

class PictureUpload extends FileUploadModel
{
    public int $img_id = 0;
    public string $img_adress = '3551739.jpg';
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


    public function fileUpload()
    {
        if ($_FILES) {
            $errors = array();
            $file_name = random_int(454534, 3242436);
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $exploded = explode('.', $_FILES['image']['name']);
            $file_ext = strtolower(end($exploded));
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (file_exists("images/user_images/" . $file_name . '.' . $file_ext)) {
                $errors[] = 'File already exists';
            }
            if (empty($errors)) {
                if (move_uploaded_file($file_tmp, "images/user_images/" . $file_name . '.' . $file_ext)) {
                    $this->img_adress = $file_name . '.' . $file_ext;
                    return true;
                }
            } else {
                print_r($errors);
            }
        }
        return false;

    }
}