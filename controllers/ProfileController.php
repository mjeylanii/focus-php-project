<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Order;
use app\models\Payment;
use app\models\PictureUpload;
use app\models\Profile;

class ProfileController extends Controller
{
    public function profile(Request $request, Response $response)
    {
        $order = new Order();
        $payment = new Payment();
        $image = new PictureUpload();
        if ($request->isPost()) {
            if ($image->fileUpload()) {
                $imgad = $image->img_adress;
                $user = ['user_id' => Application::$app->session->get('user')];
                $newImg = ['img_adress' => $image->img_adress];
                if ($image::update($newImg, $user, $image::class)) {
                    Application::$app->session->setFlash('uploaded', 'Picture uploaded succesfully');
                } else {
                    Application::$app->session->setFlash('notuploaded', 'Picture not uploaded');
                }

            }
        }

        $imageAdd = $image->FindOne(['user_id' => Application::$app->session->get('user')], $image::class);
        if( $imageAdd){
            return $this->render('profile', $imageAdd);
        }
       else{
           return $this->render('profile');
       }
    }
}