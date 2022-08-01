<?php
use app\assets\StorageAsset;
use yii\helpers\Html;

StorageAsset::register($this)
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Главная</title>
    <meta name="viewport" content="width=device-width">
    <?php $this->head() ?>
<!--    <link rel="stylesheet" href="assets/css/style.css">-->
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <nav class="nav_btn">
        <?= Html::a('Склад', '/storage', ['class' => 'storage_nav']) ?>
        <?= Html::a('Журнал', '/storage/journal', ['class' => 'storage_nav']) ?>
        <?= Html::a('Поступление товара', '/storage/add-product', ['class' => 'storage_nav']) ?>
        <?= Html::a('Использование товара', '/storage/del-product', ['class' => 'storage_nav']) ?>
    </nav>

</header>

<?= $content ?>

<footer>Все права защищены</footer>
<!--<script src="assets/js/general.js"></script>-->
<!--<script src="assets/js/{{.JS}}"></script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>