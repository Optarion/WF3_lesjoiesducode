<?php
session_name('jdc_sess');
session_start();

$current_page = basename($_SERVER['PHP_SELF']);

$pages = array(
	'index.php' => 'Home',
	'random.php' => 'JDC aléatoire',
	'send.php' => 'Envoyer votre JDC',
);