<?php
	require_once 'partials/head.php';

	if(!empty($_GET['id'])){
		$id = intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

		if($id != 0){
			$query = $db->prepare('SELECT author, content, creation_date FROM posts WHERE id = :id');
			$query->bindValue('id', $id, PDO::PARAM_INT);
			$query->execute();

			$post = $query->fetch();
		}else{
			header("Location: 404.php");
			exit();
		}
	}else{
		header("Location: 404.php");
		exit();
	}


?>
	<h1><?= date("d/m/Y", strtotime($post['creation_date'])) ?> par <?= ucfirst($post['author']) ?></h1>

	<hr>
	<div class="post">
	    <blockquote>
	      <p><?= nl2br($post['content']) ?></p>
	    </blockquote>
	</div>

<?php
	require_once 'partials/footer.php'
?>