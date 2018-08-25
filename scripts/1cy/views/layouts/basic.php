<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--функция позволяет отправлять POST вместо неё можно откл.токена  в PC п 28 -->
     <!-- Html::csrfMetaTags() -->
    <title><?=($this->title) ?></title>
    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- класс wrap подкл. в стилях css -->
    <div class="wrap">
    <!--bootstrap conteiner -->
        <div class="container">
        <!-- menu -->
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><?= Html::a('Главная', '/web/') ?></li>
                <li role="presentation"><?= Html::a('Статьи', ['post/index']) ?></li>
                <!--ссылка на просмотр отдельной статьи -->
                <li role="presentation"><?= Html::a('Статья', ['post/show']) ?></li>
            </ul>
			<!--вывод сообщения из show -->
             <?php if( isset($this->blocks['block1']) ): ?>
                <?php echo $this->blocks['block1'] ?>
            <?php endif; ?>
             <?php if( isset($this->blocks['block2']) ): ?>
                <?php echo $this->blocks['block2'] ?>
            <?php endif; ?>

            <!-- CONTENT ПЕРЕНЕСЁН В КЛАСС CONTEINER -->
            <?= $content ?>

        </div>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>