<<<<<<< HEAD
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Контакты</title>
    <meta name="description" content="Обратная связь">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Обратная связь</h1>
        <p>Напишите нам, если у вас есть вопросы</p>
        <form action="/contact" method="post" class="form-control">
            <input type="text" name="name" placeholder="Введите имя" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"><br>
            <input type="email" name="email" placeholder="Введите email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
            <input type="text" name="age" placeholder="Введите возраст" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>"><br>
            <textarea name="message" placeholder="Введите само сообщение"><?= isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
            <div class="error"><?= isset($data['message']) ? $data['message'] : '' ?></div>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свяжитесь с нами</title>
    <meta name="description" content="Свяжитесь с нами" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css?url=<?=mt_rand(0,100)?>" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css?url=<?=mt_rand(0,100000)?>" type="text/css" charset="utf-8">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Контакты</h1>
        <p>Напишите нам, если у вас есть вопросы</p>
        <form action="/contact" method="post" class="form-controll">
            <input type="text" name="name" placeholder="Введите имя" value="<?= $_POST['name'] ?? '' ?>"><br>
            <input type="email" name="email" placeholder="Введите email" value="<?= $_POST['email'] ?? '' ?>"><br>
            <input type="text" name="age" placeholder="Введите возраст" value="<?= $_POST['age'] ?? '' ?>"><br>
            <textarea name="message" placeholder="Введите само сообщение"><?= $_POST['message'] ?? '' ?></textarea><br>
            <div class="error"><?= $data['message'] ?? '' ?></div>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
            <button class="btn" id="send">Отправить</button>
        </form>
    </div>

<<<<<<< HEAD
    <?php require 'public/blocks/footer.php' ?>
=======
    <?php require_once 'public/blocks/footer.php'; ?>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
</body>
</html>
