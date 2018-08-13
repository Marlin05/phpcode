<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title><?=$title;?></title>
<meta name="" content="">
<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
</head>
<body>
<h2>HEADER</h2>
<hr>
<? foreach($text as $item) :?>
	<h2>
		<a href="index.php?option=view&id=<?=$item['id'];?>"><?=$item['title']?></a>
	</h2>
	<p>
		<?=$item['discription'];?>
	</p>
<? endforeach; ?>
<hr>
<h3>FOOTER</h3>
</body>
</html>