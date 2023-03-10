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




// $kernel = $app->make(Kernel::class);

// $response = $kernel->handle(
//     $request = Request::capture()
// )->send();

// $kernel->terminate($request, $response);

require_once __DIR__ . '/Classes/User.php';
require_once __DIR__ . '/Classes/IValidator.php';
require_once __DIR__ . '/Classes/UserValidator.php';
require_once __DIR__ . '/Classes/Comment.php';

use Classes\User;
use Classes\UserValidator;
use Classes\Comment;

$app = require_once __DIR__ . '/../bootstrap/app.php';

function Test()
{


    $user1 = new User("Sasha", "Mail");
    $user2 = new User("", "");

    $user1->creationTime->modify('-1 year');


    $validator = new UserValidator();
    $errors1 = $validator->validate($user1);
    $errors2 = $validator->validate($user2);


    echo "user1\n";
    foreach ($errors1 as $k => $v) {
        if (count($v) > 0) {
            echo $k . " " . (string)$v . "\n";
        }
    }
    echo "user2\n";
    foreach ($errors2 as $k => $v) {
        if (count($v) > 0) {
            echo $k . " " . (string)$v . "\n";
        }
    }

    
}

Test();