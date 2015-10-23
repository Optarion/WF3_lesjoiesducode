<?php
	require_once 'inc/config.php';
	require_once '../inc/db.php';
	require_once '../inc/func.php';

if(!userIsLogged()){
	header('Location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Espace d'administration</title>

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script src="js/holder.js"></script>
	<script src="js/app.js"></script>
	<!--
	<script src="js/jquery.hotkeys.js"></script>
	<script src="js/bootstrap-wysiwyg.js"></script>
	-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">

	<link href="css/styles.css" rel="stylesheet">
</head>

<body>

	<?php
		require_once 'navbar.php';
	?>

<div class="container-fluid">

	<div class="row">

		<div id="main-container" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">