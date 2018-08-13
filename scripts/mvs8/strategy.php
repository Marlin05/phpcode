<?php
abstract class FileStrategy {
	abstract function createFile($name);
}


class Zip extends FileStrategy {
	public function createFile($name) {
		return $name.".zip";
	}
}

class Targz extends FileStrategy {
	public function createFile($name) {
		return $name.".tar.gz";
	}
}

if(strstr($_SERVER['HTTP_USER_AGENT'],"Win")) {
	$object = new Zip();
}
else {
	$object = new Targz();
}

$file1 = $object->createFile("Foto");
$file2 = $object->createFile("documents");

echo '<p>New files</p>';
echo '<a href="'.$file1.'">First file</a><br>';
echo '<a href="'.$file2.'">Second file</a>';
?>