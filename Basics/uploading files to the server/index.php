<?php
error_reporting(-1);
// информация о сервере
/*print_r($_SERVER);
echo '</pre>';*/

// echo $_SERVER['PHP_SELF']; 
// echo $_SERVER['SERVER_NAME'];
// echo $_SERVER['QUERY_STRING'];
// echo $_SERVER['DOCUMENT_ROOT'];
// echo $_SERVER['HTTP_HOST'];
// echo $_SERVER['HTTP_REFERER']; // ссылка на реферный файл в test.php <a href="index.php">INDEX</a>

// echo $_SERVER['REMOTE_ADDR'];

if(isset($_POST['send'])){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}
//если arr не пуст,  то распечатаем
if( !empty($_FILES) ){
	echo '<pre>';
	print_r($_FILES);
	echo '</pre>';
	
     move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);

	// загрузка с произвольным именем
	/*move_uploaded_file($_FILES['file']['tmp_name'], 'upload/test.jpg');
*/
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form method="post" action="" enctype="multipart/form-data">
		<p>
			<input type="text" name="name">
		</p>
		<p>
			<textarea name="text"></textarea>
		</p>
		<p>
			<input type="file" name="file">
		</p>
		<p>
			<button type="submit" name="send" value="test">Send</button>
		</p>
	</form>

	<hr>

</body>
</html>