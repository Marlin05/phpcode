<?php

for( $i =1; $i <=10; $i++ )
{
echo 'Hello, world!<br>';
}



for( $i =1; $i <=10; $i++ )

{
echo $i . '<br/>';

}


for( $i =1; $i <=10; $i++ )
{
	echo $i;

if ($i % 2 == 0 )
{
	echo '- Even number';
	} else
	{
		echo '-Odd number';
	}

echo '<br>';

}