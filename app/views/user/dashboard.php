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
