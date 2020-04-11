<p><b><?php echo $message; ?></b></p>

<?php
    if($error != ""){echo "You are not logged in!";}
?>

<form method="post" action="/user/login">
    <p><b>Авторизация на сайте:</b></p>
    <p>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <input type="password" name="pass" value=""><br>
    </p>
    <p><input type="submit">
    </p>
</form>
