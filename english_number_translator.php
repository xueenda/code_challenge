<?php

$testCases = [
	'six', 
	'negative seven hundred twenty nine',
	'one million one hundred one'
	];

$map = [
	'zero' =>0,
	'one' =>1, 
	'two' =>2, 
	'three'=>3, 
	'four'=>4, 
	'five'=>5, 
	'six' =>6, 
	'seven'=>7, 
	'eight'=>8,
	'nine'=>9,
	'ten'=>10,
	'elven'=>11,
	'twelve'=>12,
	'thirteen'=>13,
	'fourteen'=>14,
	'fifteen'=>15,
	'sixteen'=>16,
	'seventeen'=>17,
	'eighteen'=>18,
	'nineteen'=>19,
	'twenty'=>20,
	'thirty'=>30,
	'fourty'=>40,
	'fifty'=>50,
	'sixty'=>60,
	'seventy'=>70,
	'eighty'=>80,
	'ninety'=>90,
	'hundred'=>100,
	'thousand'=>1000,
	'million'=>1000000
	];

function solution($word){
	global $map;

	if(!is_string($word))
		return false;
	
	$word = strtolower($word);
	$number = 0;
	$numbers = [];
	$words = explode(' ', $word);
	foreach ($words as $val) {
		if($map[$val] < 100){
			$number += $map[$val];
		}else{
			$number *= $map[$val];
			$numbers[] = $number;
			$number = 0;
		}
	}

	foreach ($numbers as $val) {
		$number += $val;
	}

	return ($words[0] === 'negative') ? 0 - $number : $number;
}

if(php_sapi_name() === 'cli'){
	foreach($testCases as $test)
		echo solution($test)."\n";
}
