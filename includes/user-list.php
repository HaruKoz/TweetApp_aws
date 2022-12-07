<div class="wrapper-right">
    <div class="rwrapper-right-container">
        <h1>おすすめユーザー</h1>
        <?php foreach ($who_users as $user) : ?>
            <div class="userbox">
                <img src="assets/images/users/<?php echo $user->img ?>" alt="userimage">
                <div class="userbox-right">
                    <a href="profile.php?username=<?php echo $user->username ?>">
                        <strong class="name"><?php echo $user->name ?></strong>
                        <p class="username">@<?php echo $user->username; ?></p>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>