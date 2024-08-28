<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина товаров</title>
    <meta name="description" content="Корзина товаров" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" type="text/css" charset="utf-8">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Корзина товаров</h1>

        <?php if (count($data['products']) == 0): ?>
            <p><?= $data['empty'] ?></p>
        <?php else: ?>
            <!-- Кнопка для удаления всех товаров -->
            <form action="/basket/clear" method="post">
                <button type="submit" class="btn_clear">Удалить все товары</button>
            </form>
            <div class="products">
                <?php
                    $sum = 0;
                    for ($i = 0; $i < count($data['products']); $i++):
                        $sum += $data['products'][$i]['price'];
                ?>
                <div class="row">
                    <img src="/public/img/<?= htmlspecialchars($data['products'][$i]['img']) ?>" alt="<?= htmlspecialchars($data['products'][$i]['title']) ?>">
                    <h4><?= htmlspecialchars($data['products'][$i]['title']) ?></h4>
                    <span><?= htmlspecialchars($data['products'][$i]['price']) ?> рублей</span>

                    <!-- Кнопка для удаления конкретного товара -->
                    <form action="/basket/remove" method="post" style="display:inline;">
                        <input type="hidden" name="item_id" value="<?= $data['products'][$i]['id'] ?>">
                        <button type="submit" class="btn btn-danger">Удалить из корзины</button>
                    </form>
                </div>
                <?php endfor; ?>
            </div>
            <button class="btn">Приобрести (<b><?= $sum ?></b> рублей)</button>
        <?php endif; ?>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>
