<?php

error_reporting(-1);

/*if(expression){
	instructions;
}*/

// $var = false;
// var_dump((bool) 0);
// var_dump((bool) '');

/*$light = 'red';

if( $light == 'green' ){
	echo 'We may go';
}*/

// var_dump( 5 < 3 );
/*if( 5 != 4 ){ // если 5 не равно 4
	echo 'OK';
}*/
/*if( 5 != 4 ){
	echo 'OK';
	echo '<p>2</p>';
}*/

$light = 'green';
if( $light == 'green' ){
	if( 5 > 3 ){
		echo '<p>5 > 3</p>';
	}
	echo 'We may go';
}elseif( $light == 'yellow' ){
	echo 'We may ready';
}elseif( $light == 'violet' ){
	echo 'We may ready';
}else{
	echo 'We must stop';
}