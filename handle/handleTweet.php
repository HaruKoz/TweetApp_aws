<?php 
include '../core/init.php';
require_once '../core/classes/validation/Validator.php';
require_once '../core/classes/image.php';

use validation\Validator;

if (User::checkLogIn() === false) 
header('location: index.php'); 

if (isset($_POST['tweet'])) {

    $status =  User::checkInput($_POST['status']) ;
    
    if ($_POST['status'] == '') {
    $_SESSION['errors_tweet'] = ['本文を入力してください'];
    header('location: ../home.php'); 
    die();
    }

    $v = new Validator;
    $v->checkIfEmpty('status', $status);
    $errors = $v->errors;
    
    if ($errors == []) { 
        
        date_default_timezone_set('Asia/Tokyo');
        $data = [
            'user_id' => $_SESSION['user_id'] , 
            'post_on' => date("Y-m-d H:i:s") ,
        ];
        // create function can handle with all tables and return last inserted id
        $post_id =   User::create('posts' , $data);
        
        $data_tweet = [
            'post_id' => $post_id ,
            'status' => $status , 
        ];
        User::create('tweets' , $data_tweet);
       
        header('location: ../home.php');
    } else {
        $_SESSION['errors_tweet'] = $errors;
        header('location: ../home.php');
    }   
} else header('location: ../home.php');
?>