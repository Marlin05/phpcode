<?php
class User {
	
	public $name;
	
	public function __construct($name) {
		$this->name = $name; // запись парам. name в знач.сво-ва $name
	}
	
	public function can() {
		
	}

	public function __clone(){
		$this->name = 'Clone str met';
	}
}


	$user = new User('Victor');
//echo $user->name;
	//echo $user->name;
	echo '<br>';

//$user2 = clone $user; // user2 не ссылка, а объект
//$user2->name = 'New SRT';
//echo $user->name; // echo 'Victor';
echo '<br>';
//echo $user2->name; //'Clone str method';

/*$user2 =  $user; // ссылка 
$user2->name = 'New SRT';
echo $user->name; // echo 'New SRT';
echo '<br>';
*/



	

?>