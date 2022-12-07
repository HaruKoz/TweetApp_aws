<?php

include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = User::getData($user_id);
$who_users = User::whoToFollow($user_id);

if (User::checkLogIn() === false)
    header('location: index.php');

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | TweetApp</title>
    <meta name="TweetApp" content="TweetAppContent">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/sanitize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <div class="wrapper-all">
        <div class="wrapper-flex">
            <?php include('includes/sidebar.php') ?>
            <main>
                <div class="wrapper-form user-info-edit-form">
                    <h1>アカウント編集</h1>
                    <form method="POST" action="handle/handleAccountSetting.php" enctype="multipart/form-data">
                        <div class="item">
                            <label for="InputUserImage1">Userimage</label>
                            <input name="image" type="file" id="InputUserImage1" />
                        </div>
                        <div class="item">
                            <label for="InputUserName">Name</label>
                            <input type="text" name="name" value="<?php echo $user->name; ?>" id="InputUserName" placeholder="Name">
                        </div>
                        <div class="item">
                            <label for="InputUserName">Username</label>
                            <input type="text" name="username" value="<?php echo $user->username; ?>" id="InputUserName" placeholder="Username">
                        </div>
                        <div class="item">
                            <label for="InputEmail1">Email</label>
                            <input type="email" name="email" value="<?php echo $user->email; ?>" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <input type="submit" name="submit" class="btn" value="保存">
                    </form>
                    <?php if (isset($_SESSION['errors_account'])) { ?>
                        <div class="alert" role="alert">
                            <?php foreach ($_SESSION['errors_account'] as $error) { ?>
                                <p style="font-size: 15px;" class="text-center"> <?php echo $error; ?> </p>
                            <?php }   ?>
                        </div>
                    <?php }
                    unset($_SESSION['errors_account'])  ?>
                </div>
            </main>
            <?php include('includes/user-list.php') ?>
        </div>
    </div>
</body>

</html>