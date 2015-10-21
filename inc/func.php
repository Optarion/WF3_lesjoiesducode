<?php

function debug($array){
		return '<pre>'.print_r($array, true).'</pre>';
}

//Fonction qui récupère l'url de référence (i.e: la page d'ou l'on provient) si elle existe
function getReferer($back_link = 'index.php', $excluded_referers = array()){

	if(!empty($_SERVER['HTTP_REFERER'])) {
		$back_link = $_SERVER['HTTP_REFERER'];
	}
	return $back_link;
}

function cutString($text, $max_length, $end = '...'){
	$sep = '[@]';
	if($max_length > 0 && strlen($text) > $max_length){
		$text = wordwrap($text, $max_length, $sep, true);
		$text = explode($sep, $text);
		return $text[0].$end;
	}
	return $text;
}

function getSynopsis($description, $max_length = 0){
	if($max_length <= 0){
		return nl2br($description);
	}
	return cutString($description, $max_length, ' [..]');
}