<?php
session_start();

// Проверяем, есть ли пользовательский ID в сессии
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
$filename = uniqid() . "_" . basename($_FILES["file"]["name"]);
$target_file = $uploadDir . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Убедитесь, что папка uploads существует
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Проверка, является ли файл изображением
$check = getimagesize($_FILES["file"]["tmp_name"]);
if ($check === false) {
    echo "Файл не является изображением.";
    $uploadOk = 0;
}

// Проверка размера файла (максимум 500 КБ)
if ($_FILES["file"]["size"] > 500000) {
    echo "Файл слишком большой.";
    $uploadOk = 0;
}

// Разрешение определенных форматов файлов
$allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Разрешены только файлы форматов JPG, JPEG, PNG и GIF.";
    $uploadOk = 0;
}

// Если все проверки пройдены, загружаем файл
if ($uploadOk) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Подключение к базе данных и сохранение имени файла
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '992301');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE users SET photo = :photo WHERE id = :id");
            $stmt->execute([':photo' => $filename, ':id' => $userId]);

            if ($stmt->rowCount() > 0) {
                header("Location: /user/dashboard");
                exit();
            } else {
                echo "Фото не было сохранено в базе данных.";
            }

        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных: " . $e->getMessage();
        }
    } else {
        echo "Ошибка при загрузке файла.";
    }
}
?>
