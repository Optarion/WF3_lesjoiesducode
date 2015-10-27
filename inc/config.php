<?php
session_name('jdc_sess');
session_start();

$current_page = basename($_SERVER['PHP_SELF']);

$pages = array(
	'index.php' => 'Home',
	'random.php' => 'JDC aléatoire',
	'send.php' => 'Envoyer votre JDC',
);

$genders = array(
	1 => 'Homme',
	2 => 'Femme'
);

define('USER_ROLE_DEFAULT', 1);
define('USER_ROLE_WRITER', 2);
define('USER_ROLE_ADMIN', 3);

$role_labels = array(
	1 => 'user',
	2 =>'writer',
	3 =>'admin'
);