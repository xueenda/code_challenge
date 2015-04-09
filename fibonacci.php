<?php

$testCases = [5,7,11];

function solution($n){
	if(!is_numeric($n))
		return false;
	
	if($n<=1) return $n;
	else return solution($n-1) + solution($n-2);
}

if(php_sapi_name() === 'cli'){
	foreach($testCases as $num)
		echo solution($num)."\n";
}