<div class="wrapper-left">
    <div class="sidebar">
        <div class="sidebar-item">
            <a href="home.php">
                <i class="fa-solid fa-house"></i>
                <strong>ホーム</strong>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="account.php">
                <i class="fa-solid fa-gear"></i>
                <strong>アカウント設定</strong>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="includes/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <strong>ログアウト</strong>
            </a>
        </div>
    </div>
    <div class="userbox">
        <img src="assets/images/users/<?php echo $user->img ?>" alt="userimage">
        <div class="userbox-right">
            <a href="profile.php?username=<?php echo $user->username ?>">
                <strong class="name"><?php echo $user->name ?></strong>
                <p class="username">@<?php echo $user->username; ?></p>
            </a>
        </div>
    </div>
</div>