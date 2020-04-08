<p><b><?php echo $message; ?></b></p>

<form method="post" action="/user/regist">
    <p><b>Регистрация на сайте:</b></p>
    <p>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <input type="password" name="pass" value=""><br>
        <input type="password" name="pass2" value="">
    </p>
    <p><input type="submit">
    </p>
</form>
