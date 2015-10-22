<?php
	require_once 'partials/head.php';

	$author = !empty($_POST['author']) ? strip_tags($_POST['author']) : '';
	$content = !empty($_POST['content']) ? strip_tags($_POST['content']) : '';

	// Initialiser un tableau $errors et une chaine $result
	$errors = array();
	$result = '';

	// Le formulaire a été soumis, l'utilisateur a appuyé sur Envoyer
	if (!empty($_POST)) {

		// Vérifier que les champs obligatoires ne sont pas vides
		// Pour chaque erreur rencontrée, ajouter une entrée dans le tableau $errors correspondant au champ en erreur
		if (empty($author) || strlen($author) > 100) {
			$errors['author'] = 'Ton nom est invalide (longueur max 100)';
		}
		if (empty($content) || strlen($content) < 20 || strlen($content) > 255) {
			$errors['content'] = 'Le contenu de ta JDC est invalide (longueur min 20, longueur max 255)';
		}

		// S'il n'y a pas d'erreur on lance la requête d'insertion
		if (empty($errors)) {

			$query = $db->prepare('INSERT INTO posts SET author = :author, content = :content, creation_date = NOW()');
			$query->bindValue(':author', $author, PDO::PARAM_STR);
			$query->bindValue(':content', $content, PDO::PARAM_STR);
			$query->execute();

			// On récupère l'identifiant unique automatiquement généré par la requête
			$insert_id = $db->lastInsertId();

			//Si la requête a réussie (c.f. lastInsertId()), on affiche une confirmation à l'utilisateur
			if (!empty($insert_id)) {
				$result .= '<div class="alert alert-success">Votre message a bien été envoyé</div>';
				$author = '';
				$content = '';
			} else {
				$result .= '<div class="alert alert-danger">Une erreur s\'est produite, merci de réessayer ultèrieurement</div>';
			}
		}
	}
?>

	<h1>Ajouter un Joie du code</h1>
	<hr>

	<?php if (!empty($errors)) { ?>
	<div class="alert alert-danger">
		<ul>
		<?php
		foreach($errors as $error) {
			echo '<li>'.$error.'</li>';
		}
		?>
		</ul>
	</div>
	<?php } ?>

	<?php
	if (!empty($result)) {
		echo $result;
	?>
	<form action="article_add.php" method="POST">
		<div class="form-group">
			<label for="author">Votre nom</label>
			<input type="text" class="form-control" name="author" id="author" placeholder="Entrez votre nom" value="<?= $author ?>">
		</div>
		<div class="form-group">
			<label for="content">Votre Joie de code</label>
			<textarea name="content" id="content" class="form-control" rows="5" placeholder="Contenu de votre Joie de code"><?= $content ?></textarea>
		</div>
		<button type="submit" class="btn btn-default">Envoyer</button>
	</form>
	<?php } ?>

	<?php
	require_once 'partials/footer.php';
	?>