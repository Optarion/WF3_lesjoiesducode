<?php

require_once 'partials/header.php';

$genders = array(
	1 => 'Homme',
	2 => 'Femme'
	);

echo debug($_POST);

$firstname = !empty($_POST['firstname']) ? strip_tags($_POST['firstname']) : '';
$lastname = !empty($_POST['lastname']) ? strip_tags($_POST['lastname']) : '';
$gender = !empty($_POST['gender']) ? intval($_POST['gender']) : '0';
$email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
$password = !empty($_POST['password']) ? strip_tags($_POST['password']) : '';
$confirm_password = !empty($_POST['confirm_password']) ? strip_tags($_POST['confirm_password']) : '';
$newsletter = !empty($_POST['newsletter']) ? intval($_POST['newsletter']) : '0';
$cgu = !empty($_POST['cgu']) ? intval($_POST['cgu']) : '0';

// Initialiser un tableau $errors et une chaine $result
$errors = array();
$result = '';
$success = false;

// Le formulaire a été soumis, l'utilisateur a appuyé sur Envoyer
if (!empty($_POST)) {

	// Vérifier que les champs obligatoires ne sont pas vides
	// Pour chaque erreur rencontrée, ajouter une entrée dans le tableau $errors correspondant au champ en erreur
	if (empty($firstname) || strlen($firstname) > 50) {
		$errors['firstname'] = 'Ton nom est invalide (longueur max 50)';
	}
	if (empty($lastname) || strlen($lastname) > 50) {
		$errors['lastname'] = 'Ton nom est invalide (longueur max 50)';
	}
	if (empty($gender)) {
		$errors['gender'] = 'Choisissez un genre';
	}
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Ton email est invalide';
	}
	if (strlen($password) > 32 || strlen($password) < 6) {
		$errors['password'] = 'Ton password est invalide (longueur min-6, max 32)';
	}else{
		if(empty($confirm_password) || strcmp($confirm_password, $password) !== 0){
			$errors['confirm_password'] = 'Le password doit être identique au password (longueur min-6, max 32)';
		}
	}
	if (!isset($_POST['cgu'])){
		$errors['cgu'] = 'Vous devez accepter les CGU';
	}


	// S'il n'y a pas d'erreur on lance la requête d'insertion
	if (empty($errors)) {

		$query = $db->prepare('SELECT id FROM user WHERE email = :email');
		$query->bindValue('email', $email);
		$query->execute();
		$user = $query->fetch();

		if(!empty($user)){
			$errors['email_double'] = 'L\'email est déjà pris';
		}else{

			$crypted_password = password_hash($password, PASSWORD_BCRYPT);

			$query = $db->prepare('INSERT INTO user SET firstname = :firstname, lastname = :lastname, gender = :gender, email = :email, password = :password, newsletter = :newsletter, created_date = NOW()');
			$query->bindValue('firstname', $firstname);
			$query->bindValue('lastname', $lastname);
			$query->bindValue('gender', $gender, PDO::PARAM_INT);
			$query->bindValue('email', $email);
			$query->bindValue('password', $crypted_password);
			$query->bindValue('newsletter', $newsletter, PDO::PARAM_INT);
			$query->execute();

			// On récupère l'identifiant unique automatiquement généré par la requête
			$insert_id = $db->lastInsertId();

			//Si la requête a réussie (c.f. lastInsertId()), on affiche une confirmation à l'utilisateur
			if (!empty($insert_id)) {
				$user = array(
					'id' => $insert_id,
					'firstname' => $firstname,
					'lastname' => $lastname,
					);

				$success = userLogin($user);

				$result .= '<div class="alert alert-success">Inscription validée</div>';
				$result .= '<script>setTimeout(function() { location.href = "article.php?id='.$insert_id.'"; }, 3000);</script>';
			} else {
				$result .= '<div class="alert alert-danger">Une erreur s\'est produite, merci de réessayer ultèrieurement</div>';
			}
		}
	}
}
?>

		<h1>Inscription</h1>
		<hr>

		<div class="card card-container">
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

			<?php if ($success == true) { ?>
			<div class="alert alert-info">
				<p>Inscription Réussie</p>
				<p>Bienvenue <?= $firstname.' '.$lastname ?>
			</div>
			<script>setTimeout(function(){ location.href = "index.php";}, 3000)</script>
			<?php }else{ ?>

			<form class="form-register" method="POST" novalidate>

				<div class="form-group">
					<label for="firstname">Prénom</label>
					<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Votre prénom" value="<?= $firstname ?>" autofocus>
				</div>

				<div class="form-group">
					<label for="lastname">Nom</label>
					<input type="text" class="form-control" name="lastname" id="lastname" value="<?= $lastname ?>" placeholder="Votre nom">
				</div>

				<div class="form-group">
					<label for="gender">Sexe</label>
					<br>
					<?php foreach($genders as $gender_value => $gender_label){
						$checked = ($gender_value == $gender) ?'checked' : '';
					?>
						<label class="radio-inline">
							<input type="radio" name="gender" id="gender_female" value="<?= $gender_value ?>"  <?= $checked ?>> <?= $gender_label ?>
						</label>
						<?php } ?>

				</div>

				<div class="form-group">
					<label for="email">Adresse email</label>
					<input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Un email valide">
				</div>

				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Un mot de passe de 6 caractères minimum">
				</div>

				<div class="form-group">
					<label for="confirm_password">Confirmation du mot de passe</label>
					<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Répétez votre mot de passe">
				</div>

				<div class="checkbox">
					<label>
						<input name="newsletter" id="newsletter" name="newsletter" type="checkbox" value="1" <?= ($newsletter) ? 'checked' : '' ?>> Inscription à la newsletter
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input name="cgu" id="cgu" name="cgu" type="checkbox" value="1" <?= ($cgu) ? 'checked' : '' ?>> Accepter les CGU
					</label>
				</div>
				<br>

				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Inscription</button>

			</form><!-- /form -->

			<?php } ?>

		</div><!-- /card-container -->

<?php require_once 'partials/footer.php' ?>