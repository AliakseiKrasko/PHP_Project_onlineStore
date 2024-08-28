<<<<<<< HEAD
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет магазина">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница сайта" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f

    <div class="container main">
        <h1>Популярные товары</h1>
        <div class="products">
<<<<<<< HEAD
            <?php for($i = 0; $i < count($data); $i++): ?>
=======
            <?php for($i = 0; $i < count($data) ; $i++): ?>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
            <div class="product">
                <div class="image">
                    <img src="/public/img/<?=$data[$i]['img']?>" alt="<?=$data[$i]['title']?>">
                </div>
                <h3><?=$data[$i]['title']?></h3>
                <p><?=$data[$i]['anons']?></p>
                <a href="/product/<?=$data[$i]['id']?>"><button class="btn">Детальнее</button></a>
            </div>
            <?php endfor; ?>
        </div>
    </div>

<<<<<<< HEAD
    <?php require 'public/blocks/footer.php' ?>
=======
    <?php require_once 'public/blocks/footer.php'; ?>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
</body>
</html>