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
    $v->validate(new validation\Name($name));
    $v->validate(new validation\Username($username));
    $v->validate(new validation\Email($email));
    $v->validate(new validation\Password($password));
    $errors = $v->errors;

    if ($errors == []) {
        $username = str_replace(' ', '', $username);

        if (User::checkEmail($email) === true) {
            $_SESSION['errors_signup'] = ['このEmailは既に使われています'];
            header('location: ../index.php');
        } else if (User::checkUserName($username) === true) {
            $_SESSION['errors_signup'] = ['このUsernameは既に使われています'];
            header('location: ../index.php');
        } else {
            User::register($email, $password, $name, $username);
        }
    } else {
        $_SESSION['errors_signup'] = $errors;
        header('location: ../index.php');
    }
} else header('location: ../index.php');
