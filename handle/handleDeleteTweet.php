<?php
include '../core/init.php'; 

if(isset($_POST['delete'])){
	$user_id  = $_SESSION['user_id'];
	$tweet_id = $_POST['tweet_id'];

	Tweet::deleteTweet($user_id, $tweet_id);
}

header('location: ../home.php');