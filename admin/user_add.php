<?php

require_once 'partials/head.php';

if($_GET['action'] == 'delete'){
	$query = $db->query('DELETE FROM user WHERE id = '.$_GET['id'].'');

	if(true){
		echo 'User deleted';

		header('refresh:3, url=users.php');
	}

}