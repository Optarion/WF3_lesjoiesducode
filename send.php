<?php
	require_once 'partials/head.php';

	$error = '';

	if(!empty($_POST)){
		$author = strip_tags($_POST['name']);
		$content = strip_tags($_POST['content']);

		if(!empty($title) && !empty($content)){
			$query = $db->prepare('INSERT INTO posts SET author = :author, content = :content, creation_date = NOW()');
			$query->bindValue('author', $author);
			$query->bindValue('content', $content);
			$query->execute();

			$last_id = $db->lastInsertId();

			if($last_id > 0){
				$error = 'Votre message a bien été envoyé, vous pouvez le voir <a href="article.php?id='.$last_id.'">ici</a>';
			}else{
				$error = 'Une erreur s\'est produite, veuillez réessayer ultérieurement';
			}

		}else{
			$error = 'Vous devez remplir tous les champs';
		}

	}



?>

	<h1>Envoyez votre Joie du code</h1>

	<hr>

	<form action="send.php" method="POST">
		<p><?= $error ?></p>
		<div class="form-group">
			<label for="name">Votre nom</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Entrez votre nom">
		</div>
		<div class="form-group">
			<label for="content">Votre Joie de code</label>
			<textarea name="content" id="content" class="form-control" rows="5" placeholder="Contenu de votre Joie de code"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>

<?php
	require_once 'partials/footer.php'
?>