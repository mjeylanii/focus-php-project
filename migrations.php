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
require_once __DIR__ . '/vendor/autoload.php';
/*This one time require helps us eliminate the need to require the file every time a new class is created*/

/*Here we declare the dotenv variable to capture the data from the .env file containing database connect info*/
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
/***************************************************************************/

/*
 * In this section we specify that we are going to use these classes in this file.
 * */

use \app\controllers\AdminController;
use \app\core\Application;
use \app\controllers\SiteController;
use  \app\controllers\AuthController;

/**************************************/
/*Here we create db keys */
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new Application(__DIR__, $config);//Create an instance of the Application class.

$app->db->applyMigrations();
/*
 * */
/*
 * Composer is to make the core folder Installable.
 * It also autoloads classes for us; so we don't have to require the files every time.
 * */

