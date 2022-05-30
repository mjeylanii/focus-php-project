<?php

/*
 * After installing Composer we get the autoload feature and to use it we need to require the autoload.php file
 * found in the composer create folder 'vendor'
 * in composer.json we configure the app namespace to be the current folder it is found at.
 * To further explain the current project is the app namespace, and all the classes created within this project
 * will be included in the autoload file.
 *
 * We won't have to require the classes but only specify its namespace.
 * */
require_once __DIR__ . '/../vendor/autoload.php';
/*This one time require helps us eliminate the need to require the file every time a new class is created*/

/*Here we declare the dotenv variable to capture the data from the .env file containing database connect info*/
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
/***************************************************************************/

/*
 * In this section we specify that we are going to use these classes in this file.
 * */

use \app\controllers\AdminController;
use app\controllers\PaymentController;
use app\controllers\ProfileController;
use \app\core\Application;
use \app\controllers\SiteController;
use  \app\controllers\AuthController;

/**************************************/
/*Here we create db keys */
$config = [
    'userClass' => \app\models\User::class,
    'productClass' => \app\models\Product::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new Application(dirname(__DIR__), $config);//Create an instance of the Application class.
/*
 * $app->router->get('/', [SiteController::class, 'home']);
   $app: Is an object of the Application class
   The $app object has access to the public variable router
   and the router variable has access to the get method.

   This can be taken as an example for "Inheritance" in Object-Oriented Programming.
*/
//Site Controller here
/*
 * The get method takes a path and method as a parameter.
 * CTRL+click on get() for more info*/
$app->router->get('/profile', [ProfileController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [ProfileController::class, 'login']);
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/services', [SiteController::class, 'services']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);
$app->router->get('/_404', [SiteController::class, 'notFound']);
//Site controllers
//Order/PaymentForm Controller
$app->router->get('/checkout', [PaymentController::class, 'checkout']);
$app->router->post('/checkout', [PaymentController::class, 'checkout']);
$app->router->get('/paymentconfirm', [PaymentController::class, 'paymentconfirm']);
//Order/PaymentForm Controller
//Authorization controller
$app->router->get('/admin', [AdminController::class, 'admin']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);
$app->router->get('/registered', [AuthController::class, 'registered']);
$app->router->get('/loggedin', [AuthController::class, 'loggedIn']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/logout', [AuthController::class, 'logout']);
//Authorization controller
//AdminController
$app->router->get('/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/orders', [AdminController::class, 'orders']);
$app->router->get('/products', [AdminController::class, 'products']);
$app->router->get('/users', [AdminController::class, 'users']);
$app->router->get('/messages', [AdminController::class, 'messages']);
$app->router->post('/orders', [AdminController::class, 'orders']);
$app->router->post('/products', [AdminController::class, 'products']);
$app->router->post('/users', [AdminController::class, 'users']);
///Admin controllers
/*
 * At the end of the index Script we execute the run method found in Application class
 *
 * */
$app->run();//Enter the run method for more details
/*
 * */
/*
 * Composer is to make the core folder Installable.
 * It also autoloads classes for us; so we don't have to require the files every time.
 * */

