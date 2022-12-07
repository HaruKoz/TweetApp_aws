<?php

include '../core/init.php';
require_once '../core/classes/validation/Validator.php';
require_once '../core/classes/image.php';

use validation\Validator;

if (User::checkLogIn() === false)
    header('location: index.php');

$user = User::getData($_SESSION['user_id']);
$currentImg = $user->img;

if (isset($_POST['submit'])) {

    $name =  User::checkInput($_POST['name']);
    $email =  User::checkInput($_POST['email']);
    $username =   User::checkInput($_POST['username']);
    $image = $_FILES['image'];

    $v = new Validator;
    $v->checkIfEmpty('name', $name);
    $v->checkIfEmpty('username', $username);
    $v->checkIfEmpty('email', $email);
    $v->checkIfImage($image);

    $errors = $v->errors;

    if ($errors == []) {

        if (User::checkEmail($email) === true && $email != $user->email) {
            $_SESSION['errors_account'] = ['このEmailは既に使われています'];
            header('location: ../account.php');
        } else if (User::checkUserName($username) === true && $username != $user->username) {
            $_SESSION['errors_account'] = ['このUsernameは既に使われています'];
            header('location: ../account.php');
        } else if (preg_match("/[^a-zA-Z0-9\!]/", $username)) {
            $_SESSION['errors_account'] = ['Usernameは半角英数字で入力してください'];
            header('location: ../account.php');
        } else {

            if ($image['name'] !== "") {
                $img = new Image($image);
                $userImg = $img->new_name;
            } else $userImg = $user->img;

            $data = [
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'img' => $userImg
            ];

            $sign = User::update('users', $_SESSION['user_id'], $data);

            if ($sign === true) {
                if ($image['name'] !== "") {
                    if ($currentImg !== 'default.png')
                        unlink('../assets/images/users/' . $currentImg);

                    $img->upload();
                }
            }

            header('location: ../account.php');
        }
    } else {

        $_SESSION['errors_account'] = $errors;
        header('location: ../account.php');
    }
} else header('location: ../home.php');
