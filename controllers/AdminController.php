<?php

namespace app\controllers;

use app\core\Application;
use app\core\ProductModel;
use app\core\Request;
use app\core\Response;
use app\models\Message;
use app\models\Order;
use app\models\Product;
use app\models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $this->setLayout('adminlayout');
        return $this->render('dashboard');
    }

    public function orders(Request $request, Response $response)
    {
        $order = new Order();
        if ($request->isGet()) {
            if($order->loadData($request->getBody())){
                if(array_key_exists('fetch_orders', $request->getBody())){
                    $orders = $order::findViewOrders(['order_id' => $order->order_id]);
                    return json_encode($orders);
                }
            }

            $orders = $order->getAll($order::class);
        }
        $this->setLayout('adminlayout');
        return $this->render('orders', $orders);
    }

    public function products(Request $request, Response $response)
    {
        $product = new Product();
        /*Product addition logic start*/
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
        } /*Product Addition logic end / Delete product logic start*/
        elseif ($request->isGet()) {
            $key = $product->primaryKey();
            $product->loadData($request->getBody());
            if (array_key_exists('delete_product', $request->getBody())) {
                $productData = [$key => $product->product_id];
                if ($product->deleteProduct($productData))
                    Application::$app->session->setFlash('deletedproduct', "The product was deleted succesfully");
                else {
                    Application::$app->session->setFlash('notdeletedproduct', "The product was not deleted");
                }
            }
        }
        /*Delete product logic end / Find product logic start*/
        if ($request->isGet()) {
            if (array_key_exists('fetch_product', $request->getBody())) {
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
        if ($request->isGet()) {
            $user = new User();
            $key = $user->primaryKey();
            $user->loadData($request->getBody());
            if (array_key_exists('delete_user', $request->getBody())) {
                $userData = [$key => $user->user_id];
                if ($user->deleteUser($userData)) {
                    Application::$app->session->setFlash('deleteduser', "User deleted");
                } else {
                    Application::$app->session->setFlash('usernotdeleted', "User not delete - Please try again");
                }
            } elseif (array_key_exists('verify_user', $request->getBody())) {
                $userData = [$key => $user->user_id];
                if ($user->verifyUser($userData)) {
                    Application::$app->session->setFlash('active', "User verified");
                }
            } else {
                Application::$app->session->setFlash('notactive', "Could not verify - Please try again");
            }
        }
        $users = User::getAll(User::class);
        $this->setLayout('adminlayout');
        return $this->render('users', $users);
    }

    public
    function messages(Request $request, Response $response)
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
                $messages = $message->getAll($message::class, ['message_status' => 'NOT READ']);
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