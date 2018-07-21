<?php

function get_bigger($a, $b)
{
	
	if( $a > $b )
	{
		return $a;
	} else
	{
	    return $b;
	}
}

$bigger = get_bigger(10, 20);

echo $bigger;


// abs, round, ceil, floor, rand, min, max

echo max (5,7,3,10,58);

