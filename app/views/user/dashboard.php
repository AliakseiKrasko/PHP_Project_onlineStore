<<<<<<< HEAD
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Кабинет пользователя">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/user.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Кабинет пользователя</h1>
        <div class="user-info">
            <p>Привет, <b><?= isset($data['user']['name']) ? $data['user']['name'] : 'Гость' ?></b></p>

            <form action="/user/dashboard" method="post" enctype="multipart/form-data">
                <!-- Отображаем ошибки, что поступают из массива data-->
                <p><?= isset($data['error']) ? $data['error'] : '' ?></p>
                <input type="file" name="image_user">
                <button type="submit" class="btn">Загрузить</button>
            </form>
            <br><br>
            <!-- Если фото есть в базе данных, то отображаем его-->
            <!-- иначе показывается фото "noimage.png"-->
            <?php if(isset($data['user']['photo']) && $data['user']['photo'] != ''): ?>
            <img src="/public/img/<?= $data['user']['photo'] ?>" width="180" height="200" alt="User Photo">
            <?php else: ?>
            <img src="/public/img/noimage.png" width="200" height="200" alt="No Image" style="width: 128px;">
            <?php endif; ?>


            <form action="/user/dashboard" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn">Выйти</button>
            </form>
        </div>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>

=======
<?php
// Подключение к базе данных для получения информации о пользователе
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '992301');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT name, photo FROM users WHERE id = :id");
$stmt->execute([':id' => $userId]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$uploadDir = '/uploads/';
$photoPath = '';

if (!empty($data['photo']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $uploadDir . $data['photo'])) {
    $photoPath = $uploadDir . $data['photo'];
} else {
    $photoPath = $uploadDir . 'default-avatar.png';  // Путь к изображению по умолчанию
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Кабинет пользователя" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/user.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Кабинет пользователя</h1>
        <div class="user-info">
            <?php if (isset($data) && is_array($data) && isset($data['name'])): ?>
                <p>Привет, <b><?= htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8') ?></b></p>

                <!-- Отображение фотографии пользователя -->
                <div class="profile-photo">
                    <img src="<?= htmlspecialchars($photoPath, ENT_QUOTES, 'UTF-8') ?>" alt="Фото пользователя" style="width:150px;height:150px;">
                </div>
                
            <?php else: ?>
                <p>Привет, Гость</p>
            <?php endif; ?>
            
            <!-- Форма загрузки фотографии -->
            <form action="/app/views/upload.php" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                <input type="file" name="file" id="file" required>
                <input type="submit" value="Загрузить">
            </form>

            <!-- Кнопка выхода -->
            <form action="/user/dashboard" method="post" style="margin-top: 20px;">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn">Выйти</button>
            </form>
        </div>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
