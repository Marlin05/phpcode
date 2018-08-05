<?php

// чтобы узнать пароль echo md5 ('123'); - пишем пароль и получаем хеш 202cb962ac59075b964b07152d234b70
    session_start();
    $error = false; // чтобы изн. не выводило 'Неверные логин и/или пароль!' она нигде не может стать true т.к.форма не отправлена
    // принимаем данные из формы
    if (isset($_POST['auth'])) { // была ли отпр.форма
        $_SESSION['login'] = $_POST['login']; // запись данных в сессию то, что отправил польз.
        $_SESSION['password'] = md5($_POST['password']);// запись в сессию и получаем хеш.пароль, пропуская через функ.md5
        $error = true; // когда польз. заполн.форму, то меняется на true  из п.5. если данные не совп. то echo п.25, если все true, то п.23
    }
    // обработка exit
    if (isset($_GET['f']) && $_GET['f'] == 'logout') {
        // удаление автор.
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    $login = 'admin';
    $password = '202cb962ac59075b964b07152d234b70';
    $auth = false; // по умолчанию false

    $iss = isset($_SESSION['login']) && isset($_SESSION['password']); // $iss - булевская перем. для пом.в неё  результата. если она будет true т.е. обе перем. сущ., то делаем проверку п.21
    if ($iss && $_SESSION['login'] === $login && $_SESSION['password'] === $password) { // проверяем и сравниваем то что пришло 
        $auth = true; // чтобы форма не выводилась если поль.  не авториз.
        $error = false; // если ош.нет то все ок.
    }
?>
<?php if ($error) { ?><p>Неверные логин и/или пароль!</p><?php } ?>
<?php if ($auth) { ?> // если польз. авт. то 
    <p>Здравствуйте, <?=$login?>!</p>
    <a href='index.php?f=logout'>Выход</a>
<?php } else { ?>
<form name="auth" method="post" action="index.php">
    <p>
        Логин: <input type="text" name="login" />
    </p>
    <p>
        Пароль: <input type="password" name="password" />
    </p>
    <p>
        <input type="submit" name="auth" value="Войти" />
    </p>
</form>
<?php } ?>