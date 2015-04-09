<?php

function solution($str){
	$max = ['index' => 0, 'distance' => 0];
	$mid = (int)(strlen($str)/2);

	$i = 1;
	// Start from middle
	while(($mid - $i) > $max['distance']){
		$indexes = [$mid - $i, $mid, $mid + $i];
		foreach ($indexes as $index) {
			$maxDistance = getSameInReverse($index, $str);
			if($maxDistance > $max['distance']){
				$max['distance'] = $maxDistance;
				$max['index'] = $index;
			}
		}
		$i++;
	}

	return substr($str, $max['index'] - $max['distance'], $max['distance']*2 + 1);
}

function getSameInReverse($index, $str){
	$i = 0;
	while($str[$index - $i -1] == $str[$index + $i +1]){
		$i++;
	}
	return $i;
}

if(php_sapi_name() === 'cli'){
	echo solution('Ilikeracecarsthatgofast')."\n";
}