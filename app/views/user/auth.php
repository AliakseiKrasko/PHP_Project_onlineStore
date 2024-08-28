<<<<<<< HEAD
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <meta name="description" content="Авторизация">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Авторизация</h1>
        <p>Здесь вы можете авторизоваться на сайте</p>
        <form action="/user/auth" method="post" class="form-control">
            <input type="email" name="email" placeholder="Введите email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
            <input type="password" name="pass" placeholder="Введите пароль" value="<?= isset($_POST['pass']) ? $_POST['pass'] : '' ?>"><br>
            <div class="error"><?= isset($data['message']) ? $data['message'] : '' ?></div>
            <button class="btn" id="send">Готово</button>
        </form>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <meta name="description" content="Авторизация" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css?url=<?=mt_rand(0,100)?>" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css?url=<?=mt_rand(0,100000)?>" type="text/css" charset="utf-8">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Авторизация</h1>
        <p>Здесь вы можете авторизоваться на сайте</p>
            <form action="/user/auth" method="post" class="form-controll">
                <input type="text" name="name" placeholder="Введите имя" value="<?= $_POST['name'] ?? '' ?>"><br>
                <input type="email" name="email" placeholder="Введите email" value="<?= $_POST['email'] ?? '' ?>"><br>
                <input type="password" name="pass" placeholder="Введите пороль" value="<?= $_POST['pass'] ?? '' ?>"><br>
                
                <div class="error"><?= $data['message'] ?? '' ?></div>
                <button class="btn" id="send">Готово</button>
            </form>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
