<?php

include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = User::getData($user_id);

if (User::checkLogIn() === false)
    header('location: index.php');

$tweets = Tweet::tweets($user_id);
$who_users = User::whoToFollow($user_id);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TweetApp</title>
    <meta name="TweetApp" content="TweetAppContent">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/sanitize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div id="delete-tweet"></div>
    <div class="wrapper-all">
        <div class="wrapper-flex">
            <?php include('includes/sidebar.php') ?>
            <main>
                <div class="timeline">
                    <div class="new-tweetbox">
                        <form class="" action="handle/handleTweet.php" method="post">
                            <textarea name="status" maxlength="160" cols="40" rows="4" placeholder="いまどうしてる？"></textarea>
                            <input class="tweetbutton" name="tweet" type="submit" value="ツイートする">
                        </form>
                        <?php if (isset($_SESSION['errors_tweet'])) : ?>
                            <?php foreach ($_SESSION['errors_tweet'] as $t) : ?>
                                <div class="alert">
                                    <?php echo $t; ?>
                                </div>
                            <?php endforeach ?>
                        <?php endif;
                        unset($_SESSION['errors_tweet']); ?>
                    </div>
                    <?php include('includes/tweets.php') ?>
                </div>
            </main>
            <?php include('includes/user-list.php') ?>
        </div>
    </div>
    <script src="assets/js/like.js"></script>
    <script src="assets/js/tweetMenu.js"></script>
</body>

</html>