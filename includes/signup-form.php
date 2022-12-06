<form action="./handle/handleSignUp.php" method="post">
    <div class="centerbox">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input class="btn" type="submit" name="signup" value="新規登録">
    </div>    
    <?php  if (isset($_SESSION['errors_signup'] )) : ?>
        <div class="alert" role="alert">
            <?php foreach ($_SESSION['errors_signup'] as $error) : ?>
                <p style="font-size: 15px;" class="text-center">
                    <?php echo $error ; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif;
        unset($_SESSION['errors_signup']);
    ?>
</from>