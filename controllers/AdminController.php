<?php

namespace app\controllers;

use app\core\Application;
use app\core\ProductModel;
use app\core\Request;
use app\core\Response;
use app\models\Message;
use app\models\Product;
use app\models\User;

class AdminController extends Controller
{
    public function admin()
    {

        $this->setLayout('adminlayout');
        return $this->render('admin');
    }

    public function orders(Request $request, Response $response)
    {
        $this->setLayout('adminlayout');
        return $this->render('orders');
    }

    public function products(Request $request, Response $response)
    {
        $product = new Product();
        if ($request->isPost()) {
            $product->loadData($request->getBody());
            if ($product->validate() && $product->save()) {
                Application::$app->session->setFlash('added', 'Successfully add product - refresh to see update');
                $response->redirect('/products');
                exit();
            } else {
                Application::$app->session->setFlash('notadded', 'Unable to add product - Product might already exist');
                $response->redirect('/products');
            }
        }
        if ($request->isGet()) {

            if ($product->loadData($request->getBody())) {
                $key = $product->primaryKey();
                $productData = [$key => $product->product_id];
                $products = $product->findOne($productData, $product::class);
                return json_encode($products);
            }
        }
        $allProducts = Product::getAll(Product::class);
        $this->setLayout('adminlayout');
        return $this->render('products', $allProducts);
    }

    public function users(Request $request, Response $response)
    {
        $users = User::getAll(User::class);
        $this->setLayout('adminlayout');
        return $this->render('users', $users);
    }

    public function messages(Request $request, Response $response)
    {
        $message = new Message();
        if ($request->isPost()) {
            $message->loadData($request->getBody());
            if ($message->validate() && $message->save()) {
                Application::$app->session->setFlash('sent', 'Your message was sent succesfully - We will get back to you as soon as possible');
                $response->redirect('/home');
            } else {
                Application::$app->session->setFlash('notsent', 'Your message was not sent - Please try again');
                $response->redirect('/home');
            }
        }
        if ($request->isGet()) {
            $key = $message->primaryKey();
            $message->loadData($request->getBody());
            if (!array_key_exists('delete_message', $request->getBody()) && array_key_exists('message_id', $request->getBody())) {
                $messageData = [$key => $message->message_id];
                $messages = $message->findOne($messageData, $message::class);
                $message->setMessage($messageData);
                return json_encode($messages);
            }
        }
        if ($request->isGet()) {
            if (array_key_exists('ajaxreq', $request->getBody())) {
                $messages = $message->getAllMessages();
                return json_encode($messages);
            }
        }
        if ($request->isGet()) {
            $key = $message->primaryKey();
            $message->loadData($request->getBody());
            if (array_key_exists('delete_message', $request->getBody())) {
                $messageData = [$key => $message->message_id];
                if ($message->deleteMessage($messageData))
                    Application::$app->session->setFlash('deleted', "The message was deleted succesfully");
                else {
                    Application::$app->session->setFlash('notdeleted', "The message was not deleted");
                }
            }

        }
        $this->setLayout('adminlayout');
        $messages = $message->getAllMessages();
        return $this->render('messages', $messages, json_encode($messages));
    }

}