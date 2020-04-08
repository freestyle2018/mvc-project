
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Задание</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="reg"><a href="/user/regist">Регистрация</a></div>
    <div class="login"><a href="/user/login">Авторизация</a></div>

    <div class="container-fluid">
        <div class="container">
            <h1>Тестовое задание</h1>
            <?php
                include ($contentPage);
            ?>
        </div>
    </div>





</body>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>
