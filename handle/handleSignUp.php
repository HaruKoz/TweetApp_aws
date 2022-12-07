<?php

include '../core/init.php';
require_once '../core/classes/validation/Validator.php';

use validation\Validator;

if (isset($_POST['signup'])) {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $v = new Validator;
    $v->checkIfEmpty('name', $name);
    $v->checkIfEmpty('username', $username);
    $v->checkIfEmpty('email', $email);
    $v->checkIfEmpty('password', $password);
    $errors = $v->errors;

    if ($errors == []) {
        $username = str_replace(' ', '', $username);

        if (User::checkEmail($email) === true) {
            $_SESSION['errors_signup'] = ['このEmailは既に使われています'];
            header('location: ../index.php');
        } else if (User::checkUserName($username) === true) {
            $_SESSION['errors_signup'] = ['このUsernameは既に使われています'];
            header('location: ../index.php');
        } else if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $_SESSION['errors_signup'] = ['Usernameは半角英数字で入力してください'];
            header('location: ../index.php');
        } else {
            User::register($email, $password, $name, $username);
        }
    } else {
        $_SESSION['errors_signup'] = $errors;
        header('location: ../index.php');
    }
} else header('location: ../index.php');
