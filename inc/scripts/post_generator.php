<?php

require_once '../func.php';
require_once '../db.php';

$content_jdc = file_get_contents("http://feeds.betacie.com/viedemerde"); //Récupère dans un String le contenu d'un flux rss

$xml_jdc = simplexml_load_string($content_jdc, 'SimpleXMLElement', LIBXML_NOCDATA); //Encode le string en xml => renvoi un objet XML
$posts = json_decode(json_encode($xml_jdc), true); // TRICK: encode puis décode un objet XML pour renvooyer un Array*/


//echo debug($posts);

foreach($posts['entry'] as $post){
	$author = strip_tags($post['author']['name']);
	$content = strip_tags($post['content']);
	$date = strip_tags($post['published']);

	if(!empty($author) && !empty($content) && !empty($date)){
		$query = $db->prepare('INSERT INTO posts SET author = :author, content = :content, creation_date = :date');
		$query->bindValue('author', $author);
		$query->bindValue('content', $content);
		$query->bindValue('date', $date);
		$query->execute();

		$last_id = $db->lastInsertId();

		if($last_id > 0){
			echo 'Post créé<br>';
		}
	}
}

