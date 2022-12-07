<?php

class Tweet extends User
{

    protected static $pdo;

    public static function getLatestTweets($limit)
    {
        $stmt = self::connect()->prepare("SELECT * from `tweets`
        ORDER BY post_time DESC LIMIT $limit");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function tweetsUser($user_id)
    {
        $stmt = self::connect()->prepare("SELECT * from `posts`
        WHERE user_id = :user_id
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function tweets($user_id)
    {
        $stmt = self::connect()->prepare("SELECT * from `posts`
        ORDER BY post_on DESC LIMIT 30");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getTweet($tweet_id)
    {
        $stmt = self::connect()->prepare("SELECT * FROM `tweets` JOIN `posts` 
        on posts.id = tweets.post_id 
        WHERE `post_id` = :tweet_id");
        $stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function unLike($user_id, $tweet_id)
    {
        $stmt = self::connect()->prepare("DELETE FROM `likes` 
            WHERE `user_id` = :user_id and `post_id` = :tweet_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }

    public static function userLikeIt($user_id, $tweet_id)
    {
        $stmt = self::connect()->prepare("SELECT `post_id` , `user_id` FROM `likes` 
            WHERE `user_id` = :user_id and `post_id` = :tweet_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }

    public static function countLikes($post_id)
    {
        $stmt = self::connect()->prepare("SELECT COUNT(post_id) as count FROM `likes`
            WHERE post_id = :post_id");
        $stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_OBJ);
        return $count->count;
    }

    public static function likedTweets($user_id)
    {
        $stmt = self::connect()->prepare("SELECT * from `posts`
            WHERE id IN (SELECT post_id from `likes` WHERE user_id = :user_id)
            ORDER BY post_on DESC");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function deleteTweet($user_id, $tweet_id)
    {
        $stmt = self::connect()->prepare("DELETE FROM `posts` 
            WHERE `user_id` = :user_id and `id` = :tweet_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }
}
