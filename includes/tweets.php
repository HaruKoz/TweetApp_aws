<?php
    // include_once('handle/handleLike.php');

    foreach($tweets as $tweet) :
    $tweet_user = User::getData($tweet->user_id);
    $tweet_real = Tweet::getTweet($tweet->id);
    $likes_count = Tweet::countLikes($tweet->id) ;
    $user_like_it = Tweet::userLikeIt($user_id ,$tweet->id);

    //これからする可能性のある行動（いいね済みならunlike、いいねしていないならlike）
    $like_or_unlike = $user_like_it ? 'unlike' : 'like';
?>
                        
<div class="tweetbox">
    <div class="leftside">
        <img class="userimage" src="assets/images/users/<?php echo $tweet_user->img ?>" alt="userimage">
    </div>                        
    <div class="rightside">
        <div class="headline">
            <a href="profile.php?username=<?php echo $tweet_user->username ?>">
                <strong><?php echo $tweet_user->name; ?></strong>
                <span class="username">@<?php echo $tweet_user->username; ?></span>
            </a>
            <span class="username">・</span>
            <span class="username"><?php echo $tweet->post_on ?></span>
            <?php if($tweet_user->id === $user_id) : ?>
                <div class="tweet-menu">
                    <i class="fa-solid fa-ellipsis"></i>
                    <div class="tweet-menu-modal" data-tweet="<?php echo $tweet->id ?>">ツイートを削除<i class="fa-solid fa-trash"></i></div>
                </div>
            <?php endif ?>
        </div>
        <p><?php echo $tweet_real->status; ?></p>
        <div class="like">
            <div class="heart-<?php echo $like_or_unlike ?>" data-tweet="<?php echo $tweet->id ?>">
                <i class="fa-solid fa-heart"></i>
                <span class="likes-count"><?php if($likes_count) echo $likes_count ?></span>
            </div>
        </div>
        <div style="clear: right;"></div>
    </div>                        
</div>

<?php endforeach ?>