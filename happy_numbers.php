<?php

function solution($numbers){

	return implode(',', getNumbers($numbers));
}

function getNumbers($numbers){
	if(is_array($numbers)){
		$count = 0;
		for($i=0; $i < count($numbers); $i++){
			if(isHappyNum($numbers[$i])){
				$numbers[$count] = $numbers[$i];
				$count++;
			}
		}
		return array_slice($numbers, 0, $count);
	}else{
		$numbers = array_map('trim', explode(',', $numbers));
		return getNumbers($numbers);
	}
}

function isHappyNum($n){
	$square = $n * $n;
	$visit = [];
	do{
		$numbers = str_split($square);
		$sum  = 0;
		foreach ($numbers as $val) {
			$sum += $val*$val;
		}
		if($sum == 1)
			return true;
		else{
			if(in_array($sum, $visit))
				return false;
			else
				$visit[] = $sum;
		}
		$square = $sum;
	}while(true);
}

if(php_sapi_name() === 'cli'){
	echo solution('1,2,3,4,5,6,7,8,9')."\n";
}