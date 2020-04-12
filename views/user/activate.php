<?php if(isset($message)){echo $message;} ?>

<form method="post" action="/user/activate">
    <p><b>Confirm your email:</b></p>
    <p>
        Code: <input type="text" name="code" value="<?php echo $code; ?>">
        <input type="hidden" name="auth" value="on">
    </p>
    <p><input type="submit">
    </p>
</form>