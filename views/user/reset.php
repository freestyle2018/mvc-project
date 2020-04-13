<?php if(isset($message)){echo $message;} ?>

<form method="post" action="/user/reset_password/">
    <p>
        <b>Enter your mail<br>
            and we will send recovery instructions.
        </b>
    </p>

    <p>
        E-mail: <input type="text" name="mail" value="<?php echo $mail; ?>">
        <input type="hidden" name="auth" value="on">
    </p>
    <p><input type="submit">
    </p>
</form>