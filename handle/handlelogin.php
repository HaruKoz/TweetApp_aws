<?php

include '../core/init.php';
require_once '../core/classes/validation/Validator.php';

use validation\Validator;

if (isset($_POST['login']) && !empty($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $email = User::checkInput($email);
        $password = User::checkInput($password);
    }

    $v = new Validator;
    $v->checkIfEmpty('email', $email);
    $v->checkIfEmpty('password', $password);

    $errors = $v->errors;
    if ($errors == []) {
        User::login($email, $password);
        if (User::login($email, $password) === false) {
            $_SESSION['errors'] = ['EmailまたはPasswordが正しくありません'];
            header('location: ../index.php?form=login');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../index.php?form=login');
    }
} else  header('location: ../index.php');
