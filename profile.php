<?php

include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = User::getData($user_id);

if (User::checkLogIn() === false)
    header('location: index.php');

if (
    isset($_SESSION['old_section']) && isset($_GET['section']) &&
    $_SESSION['old_section'] !== $_GET['section']
) {
    $move = true;
} else {
    $move = false;
}

$who_users = User::whoToFollow($user_id);

if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    $profile_user = User::getDataByUserName($username);
}

$section_style = array(
    'tweets' => "unselected-section",
    'likes' => "unselected-section"
);
if (isset($_GET['section']) && ($_GET['section']) === 'likes') {
    $tweets = Tweet::likedTweets($profile_user->id);
    $section_style['likes'] = "selected-section";
    $_SESSION['old_section'] = 'likes';
} else {
    $tweets = Tweet::tweetsUser($profile_user->id);
    $section_style['tweets'] = "selected-section";
    $_SESSION['old_section'] = 'tweets';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | TweetApp</title>
    <meta name="TweetApp" content="TweetAppContent">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/sanitize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body onLoad="moveSectionBorder(<?php echo $move ?>)">
    <div class="wrapper-all">
        <div class="wrapper-flex">
            <?php include('includes/sidebar.php') ?>
            <main>
                <div class="timeline">
                    <div class="userbox profile">
                        <img src="assets/images/users/<?php echo $profile_user->img ?>" alt="userimage">
                        <strong class="name"><?php echo $profile_user->name ?></strong>
                        <p class="username">@<?php echo $profile_user->username; ?></p>
                    </div>
                    <div class="sections">
                        <ul id="section-list">
                            <li>
                                <a id="<?php echo $section_style['tweets'] ?>" href="?username=<?php echo $profile_user->username ?>&section=tweets">
                                    ツイート
                                </a>
                            </li>
                            <li>
                                <a id="<?php echo $section_style['likes'] ?>" href="?username=<?php echo $profile_user->username ?>&section=likes">
                                    いいね
                                </a>
                            </li>
                            <div id="section-border" tabindex="-1"></div>
                        </ul>
                    </div>
                    <?php include('includes/tweets.php') ?>
                </div>
            </main>
            <?php include('includes/user-list.php') ?>
        </div>
    </div>
    <script src="assets/js/profile-section.js"></script>
    <script src="assets/js/like.js"></script>
</body>

</html>