<?

function __autoload($var) {
	include 'classes/'.$var.'.php';
}


$user = new Customer('Viktor');
// проверка
//еслио объект user принадлежит классу Custimer
//true т.к User род.класс Customer
if($user instanceof User) {
	if($user instanceof Customer) {
		echo 'klass user is customer';
	}
	else {
		echo 'klass user is User';
	}
	
}

echo $user->name; // Victor
echo '<br>';
$user2 = clone $user; //скопировать $user
echo $user2->name;



?>