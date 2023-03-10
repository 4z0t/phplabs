<?php

use Illuminate\Support\Facades\Route;

use Classes\User;
use Classes\UserValidator;
use Classes\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {



    $user1 = new User("Sasha", "Mail");
    $user2 = new User("", "");

    $user1->creationTime->modify('-1 year');


    $validator = new UserValidator();
    $errors1 = $validator->validate($user1);
    $errors2 = $validator->validate($user2);


    echo "user1" . "<br/>";
    foreach ($errors1 as $k => $v) {
        if (count($v) > 0) {
            echo $k . " " . (string)$v . "<br/>";
        }
    }
    echo "user2" . "<br/>";
    foreach ($errors2 as $k => $v) {
        if (count($v) > 0) {
            echo $k . " " . (string)$v . "<br/>";
        }
    }



    $comments = [
        new Comment($user1, "Hello world!"),
        new Comment($user1, "AAAAAAA"),
        new Comment($user2, "BBBBBBBBBB"),
        new Comment($user2, ",mfnsdkjfhdskfhksdfj"),
    ];

    $checkDate = new DateTime('now');
    $checkDate->modify('-1 month');


    foreach ($comments as $comment) {
        if ($comment->user->creationTime > $checkDate) {
            echo $comment->text . "<br/>";
        }
    }
});
