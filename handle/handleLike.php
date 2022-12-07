<?php

include '../core/init.php';

if (isset($_POST['like']) && !empty($_POST['like'])) {
    $user_id  = $_SESSION['user_id'];
    $tweet_id = $_POST['post_id'];

    User::create('likes', array('user_id' => $user_id, 'post_id' => $tweet_id));

    echo Tweet::countLikes($tweet_id);
}

if (isset($_POST['unlike']) && !empty($_POST['unlike'])) {
    $user_id  = $_SESSION['user_id'];
    $tweet_id = $_POST['post_id'];

    Tweet::unLike($user_id, $tweet_id);

    echo Tweet::countLikes($tweet_id);
}
