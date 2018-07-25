<?php
error_reporting(-1);

//данные принимаются на этой же стр.поэтому не указан action.php
if(isset($_POST['send'])){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}

if(!empty($_GET)){
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form method="post" action="">
		<p>
			<input type="text" name="name">
		</p>
		<p>
			<textarea name="text"></textarea>
		</p>
		<p>
			<input type="checkbox" name="remember">
		</p>
		<p>
			<select name="lang">
				<option value="eng">English</option>
				<option value="ru">Russian</option>
				<option value="jp">Japan</option>
			</select>
		</p>
		<p>

		<p>
			<select name="lang[]" multiple="">
				<option value="eng">English</option>
				<option value="ru">Russian</option>
				<option value="jp">Japan</option>
			</select>
		</p>
		<p>

			<button type="submit" name="send" value="test">Send</button>
		</p>
	</form>

	<hr>

	<a href="index.php?name=Петя&amp;test=123&amp;subject=TEST">link</a>

	<!--<p>Введённое имя 
		<?php if(isset($_POST['name'])) echo $_POST['name']; else echo 'Форма не отправлена' ?>
	</p> -->

	<p>Введенное имя: <?php if(!empty($_POST['name'])) echo $_POST['name']; else echo 'форма не отправлена' ?></p>
	<!-- тернальный оператор -->
	<?php //условие ? да : нет ?>
	<!-- nl2br - перенос стр. -->
	<p>Введенный текст: <?php echo !empty($_POST['text']) ? nl2br($_POST['text']) : 'форма не отправлена' ?></p>
	<p>
		<?php if(isset($_POST['remember']) && $_POST['remember'] == 'on') echo 'Чекбокс отмечен' ?>
	</p>	

</body>
</html>