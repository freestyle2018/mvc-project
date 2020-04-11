

<?php echo $error; ?>

<form method="post" action="/user/add">
    <p><b>Регистрация на сайте:</b></p>
    <p>
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>"><br>
        Category: <input type="text" name="category" value="<?php echo $category; ?>">
    </p>
    <p><input type="submit">
    </p>
</form>
