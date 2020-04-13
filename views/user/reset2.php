<?php if(isset($message)){echo $message;} ?>

<form method="post" action="/user/reset/">
    <p>
        <b>Enter this key<br> and set your password.
        </b>
    </p>

    <p>
        Key: <input type="text" name="code" value="<?php echo $code; ?>"><br>
        Pass_1: <input type="password" name="pass_1" value=""><br>
        Pass_2: <input type="password" name="pass_2" value=""><br>
        <input type="hidden" name="auth" value="on">
    </p>
    <p><input type="submit">
    </p>
</form>