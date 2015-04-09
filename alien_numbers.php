<?php

$maps = ['o','F','8'];

function solution($n){
	global $maps;

	if(is_numeric($n) && !preg_match('/\+|\-/',$n)){
		$numTranslated = getTranslated($n+1);
		for($i=0;$i < strlen($numTranslated);$i++)
			$numTranslated[$i] = $maps[(int)$numTranslated[$i]];
		return $numTranslated;
	}else{
		$str = '';
		$length = strlen($n);
		for($i=0; $i<$length; $i++){
			// convert char to ascii except 0 ~ 9
			$input = is_numeric($n[$i]) ? (int)$n[$i] : ord($n[$i]);
			$str .= solution($input);
		}
		return $str;
	}	
}

function getTranslated($n){
	$binary = '';
	do{
		$divided = (int)($n/3);
		$mod = $n % 3;
		$binary = $mod.$binary;
		$n = $divided;
	}while($n >= 3);
	if($n > 0)
		$binary =  $n.$binary;
	return $binary;
}

if(php_sapi_name() === 'cli'){
	for($i=0; $i<10; $i++)
		echo solution($i)."\n";
	echo solution('alien_number source_language target_language')."\n";	
}