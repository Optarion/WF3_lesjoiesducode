<?php
	require_once 'partials/head.php';

	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$action = !empty($_GET['action']) ? $_GET['action'] : 'insert';

	//Gestion de l'action update
	if(!empty($id)){

		$query = $db->prepare('SELECT * FROM posts WHERE id = :id');
		$query->bindValue('id', $id, PDO::PARAM_INT);
		$query->execute();

		$post = $query->fetch();

		//Gestion de l'action delete
		if(!empty($_GET) && $_GET['action'] == 'delete'){
			$query = $db->query('DELETE FROM posts WHERE id = '.$id);

			header('Location: articles.php');
			exit();
		}
	}

	if(empty($post) && $action == 'update'){
		exit('Undefined article');
	}

	$author = isset($_POST['author']) ? strip_tags($_POST['author']) : @$post['author'];
	$content = isset($_POST['content']) ? strip_tags($_POST['content']) : @$post['content'];
	$picture = isset($_FILES['picture']['name']) ? $_FILES['picture']['name'] : @$post['picture'];//stocke le nom d'origine pour modification de sécurité

	$max_file_size = 2000000; // ~2Mo

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

			if($_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['size'] < $max_file_size){

				$picture_mime_type = image_type_to_mime_type(exif_imagetype($_FILES['picture']['tmp_name']));

				switch($picture_mime_type){
					case 'image/png':
					case 'image/jpeg':
					case 'image/gif':
						move_uploaded_file($_FILES['picture']['tmp_name'], '../img/uploads/'.$picture);
					break;

					default:
						$errors['picture'] = 'Le fichier doit être une image';
						$picture = '';
					break;
				}
			}else{
				$errors['picture'] = 'Le fichier doit faire moins de 3Mo';
				$picture = '';
			}
		}

		if (empty($errors)) {

			if($action == 'update'){
				$query = $db->prepare('UPDATE posts SET author = :author, content = :content, picture = :picture, creation_date = NOW() WHERE id = :id');
				$query->bindValue('id', $id, PDO::PARAM_INT);
			}else{
				$query = $db->prepare('INSERT INTO posts SET author = :author, content = :content, picture = :picture, creation_date = NOW()');
			}

			$query->bindValue(':author', $author, PDO::PARAM_STR);
			$query->bindValue(':content', $content, PDO::PARAM_STR);
			$query->bindValue(':picture', $picture, PDO::PARAM_STR);
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

	<h1><?= ucfirst($action) ?> un "Joie du code"</h1>
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
	}else{ ?>
		<form action="article_action.php" method="POST" enctype="multipart/form-data">

			<!-- Donne une valeur minimum au fichier uploadé (si File Size > MAX_FILE_SIZE alors $_FILES renvoi une erreur) -->
			<input type="hidden" name="MAX_FILE_SIZE" value="<?= $max_file_size ?>">

			<div class="form-group">
				<label for="author">Votre nom</label>
				<input type="text" class="form-control" name="author" id="author" placeholder="Entrez votre nom" value="<?= $author ?>">
			</div>
			<div class="form-group">
				<label for="content">Votre Joie de code</label>
				<textarea name="content" id="content" class="form-control" rows="5" placeholder="Contenu de votre Joie de code"><?= $content ?></textarea>
			</div>
			<div class="form-group">
				<label for="picture">Image</label>
				<input type="file" name="picture" id="picture" class="form-control">
			</div>
			<button type="submit" class="btn btn-default">Envoyer</button>
		</form>
	<?php
	} ?>

	<?php
	require_once 'partials/footer.php';
	?>