
<?php
//$this->title = 'Одна статья';
 //debug($cats);
use app\components\MyWidget;
 /*foreach ($cats as $cat) {
	echo $cat->title . '<br>';
}*/
?>

<!-- выводим все катагории cо вложенным списком продуктов -->
<!-- чтобы вывести продукты обращаемся к объекту prodacts и св-ву $cat --> 
<?php
//полный список товаров
/*
foreach ($cats as $cat) {
    echo '<ul>';
        echo '<li>' . $cat->title . '</li>';
        // получаем prodacts обращаясь к cats исп.отложенную загрузку 
        $products = $cat->products;
        foreach ($products as $product) {
            echo '<ul>';
                echo '<li>' . $product->title .  '</li>';
            echo '</ul>';
        }

    echo '</ul>';
}*/
?>

<!-- если таблица названа products, то и указываем в кач. св-ва объекта -->

<!-- products т.к. метод в модели Category getproducts -->
<!-- запрос аналогичен Select * from 'products' WHERE 'parent'= = '694'  т.е. id category п.103 PC-->
<!--ленивая/отложенная загрузка в том, что если нет обращения здесь то запрос из контроллера не выполняется -->
<?php //echo count($cats->products) ?>
<!-- жадная загрузка п.107 PC -->
<?php //echo count($cats[0]->products) ?>
<?php
//debug($cats);
?>

<!--передача данных из вида в шаблон для одной стр
чтобы вывести сообщение необходимо обратиться к шаблону basik п.33-->
<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>

<h1><!--Show Action</h1>

<?php echo MyWidget::widget(['name' => 'Петя']); ?>
<!--если убрать парам. то будет исп.парам.по умолчанию Гость п.22 myWidget -->
<?php //echo MyWidget::widget(); ?>

<?php MyWidget::begin()?>
    <h1>Добар, дан!</h1>
<?php MyWidget::end()?>



<!-- чтобы не подкл.отдельный файл можно отправить Ajax в п.17 -->
<button class="btn btn-success" id="btn">Click me...</button>
<!-- где находиться файл подкл.скриптов
//скрипты можно подкл.как глобально так и нет.
@web приведёт в assets -->
<!--1 метод-->
<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<!--2 метод подкл.если кода немного- указываем блок js кот. хотим подкл.--> 
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>

<!-- регистрация Сss добавление цвета back -->
<?php //$this->registerCss('.container{background: #ccc;}') ?>
<!--3 метод подкл. если кода много в перем.js пом.весь js код c методом маркера HEREDOC
в HTML помещаем js и все это пом. в пер. js для вызова в registerJs-->

<!--под this п.37 можно указать позицию где подкл.js 
View::POS_BEGIN, View::POS_END -->
<?php

$js = <<<JS
    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123'},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);
?>
