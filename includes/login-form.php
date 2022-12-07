<form action="./handle/handlelogin.php" class="login-box" method="POST">
    <div class="centerbox">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" class="btn" value="ログイン">
    </div>
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="alert" role="alert">
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <p style="font-size: 15px;" class="text-center">
                    <?php echo $error; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif;
    unset($_SESSION['errors']);
    ?>
</form>