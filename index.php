<?php 
    include 'core/init.php' ;
    
    if (isset($_SESSION['user_id'])) {
      header('location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | TweetApp</title>
    <meta name="TweetApp" content="TweetAppContent">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/sanitize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/top.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="wrapper-all">
        <header>
            <div class="header-container">
                <a class="btn" href="?form=login">ログイン</a>
                <a class="btn" href="?form=signup">新規登録</a>
                <!--
                <span class="logo fa-brands fa-twitter"></span>
                -->
            </div>
        </header>
        <div class="centerbox-outer">
            <h1>「いま」起きていることを見つけよう</h1>
            <p>TweetAppなら、「いま」起きていることをいち早くチェックできます。</p>
            <?php
                if ( isset( $_GET['form'] ) ) {
                    if($_GET['form'] === 'login') {
                        include('includes/login-form.php'); 
                    }elseif($_GET['form'] === 'signup') {
                        include('includes/signup-form.php');
                    }
                }else{
                    include('includes/signup-form.php'); 
                }             
            ?>
        </div>
    </div>
</html>