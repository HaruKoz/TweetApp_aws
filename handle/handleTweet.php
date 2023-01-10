<?php

include '../core/init.php';
require_once '../core/classes/validation/Validator.php';

use validation\Validator;

if (User::checkLogIn() === false)
    header('location: index.php');

if (isset($_POST['tweet'])) {

    $status =  User::checkInput($_POST['status']);

    $v = new Validator;
    $v->validate(new validation\Status($status));
    $errors = $v->errors;

    if ($errors == []) {
        date_default_timezone_set('Asia/Tokyo');
        $data = [
            'user_id' => $_SESSION['user_id'],
            'post_on' => date("Y-m-d H:i:s"),
        ];
        $post_id =   User::create('posts', $data);
        $data_tweet = [
            'post_id' => $post_id,
            'status' => $status,
        ];
        User::create('tweets', $data_tweet);
        header('location: ../home.php');
    } else {
        $_SESSION['errors_tweet'] = $errors;
        header('location: ../home.php');
    }
} else header('location: ../home.php');
