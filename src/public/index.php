<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/Classes/User.php';
use Classes\User;
$app = require_once __DIR__ . '/../bootstrap/app.php';

// $kernel = $app->make(Kernel::class);

// $response = $kernel->handle(
//     $request = Request::capture()
// )->send();

// $kernel->terminate($request, $response);


echo "Hello from PHP\n";
echo "ABOBA";



readfile("index.html");

$user1 = new User("Sasha", "Mail");
$user2 = new User("", "");




$validator = Validation::createValidator();
$errors1 = $validator->validate($user1);
$errors2 = $validator->validate($user2);

if (count($errors1) > 0) {
    $errstr = (string) $errors1;
    echo "1:$errstr";
}

if (count($errors2) > 0) {
    $errstr = (string) $errors2;
    echo "2:$errstr";
}
