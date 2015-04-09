<?php

function solution($num){
	if(!is_numeric($num))
		return false;
	$square = $num * $num;

	if(strlen($square) === 1)
		return false;

	$digit = strlen($num);

	// Count the right number
	$right = $square % pow(10, $digit);

	// Put all left numbers to array
	for($i = 0; $i < $digit; $i++){
		$left = (int) ($square / pow(10, $digit - $i));
		if($left + $right == $num)
			return true;
	}

	return false;
}

if(php_sapi_name() === 'cli'){
	echo "Kaprekar number under 1000";

	for($i=1; $i<1000; $i++){
		if(solution($i))
			echo $i."\n";
	}
}