<?php

// в result добавл.рез. и голос кот.польз.передал
    require_once 'model.php';
    
    $variant_id = $_POST['variant_id']?? false; //получаем вар.за кот.польз.прогол.либо если его нет - false
    //если польз.вар.не отпр. то редирект:
    if (!$variant_id) {
        header('Location: index.php');
        exit;
    }
    $variant_id = htmlspecialchars($variant_id);
    $m = new Model(); //созд.нов модель
    $result = $m->addVoter($variant_id); // добавл.с помощ.метода addVoter из model.php т.е. добав. голос в бд
    $poll = $m->getPollOnVariantId($variant_id); // вызываем метод и пол.опрос по данному вар.
    //зная id вар. узнаем id опроса. 
    //зная id опроса можем пол. весь опрос. 
    //зная id опроса пол.все варианты 
    // если опрос найдет-пол.все вар.:
    // создаем асс.arr где ключем явл. id вар.п.29 и доб.ешё один.эл.-поле кол-во гол.:
    if ($poll) {
        $variants = $m->getVariants($poll['id']); // пол.все варианты опроса 
        // создадим arr чтобы собрать все id:
        $ids = []; 
        foreach ($variants as $v) $ids[] = $v['id']; // создаём 1 id для всех вариантов опроса
        $voters = $m->getVoters($ids);// получ.все голос.для вариантов
        $temp = []; // форм.нов. arr c вар.чтобы недопуст.перетирания variants
        foreach($variants as $v) {
            $temp[$v['id']] = $v; // пом. в arr где в кач.ключа ук. id элем. и знач.сам вар.
            $temp[$v['id']]['voters'] = 0; // доб. ещё одну стр.в табл.- кол-во гол.
        }
        $variants = $temp; // переопред. arr
        // перечисляем все получ. из бд голоса: 
        foreach ($voters as $v) $variants[$v['variant_id']]['voters']++; // переб.голоса и ув.при каждом попад.голосе. обращаясь к id элем.voters в двум.arr
    }
    else {
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Результаты голосования</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body style="text-align: center;">
    <h1>Спасибо за Ваш голос!</h1>
    <?php foreach($variants as $v) { ?>
        <div>
            <?=$v['title']?>: <b><?=$v['voters']?> чел.</b>
        </div>
    <?php } ?>
    <a href='index.php'>Вернуться на главную</a>
</body>
</html>