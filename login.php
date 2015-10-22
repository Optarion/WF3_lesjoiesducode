<?php require_once 'partials/header.php';

$success = false;

if(!empty($_COOKIE['remember_me'])){

	parse_str($_COOKIE['remember_me'], $output);

	userLogin($output);

	header('Location: index.php');
	exit();

}else{
	$email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
	$password = !empty($_POST['password']) ? strip_tags($_POST['password']) : '';
	$remember = !empty($_POST['remember']) ? intval($_POST['remember']) : '';

	// Initialiser un tableau $errors et une chaine $result
	$errors = array();

	// Le formulaire a été soumis, l'utilisateur a appuyé sur Envoyer
	if (!empty($_POST)) {

		// Vérifier que les champs obligatoires ne sont pas vides
		// Pour chaque erreur rencontrée, ajouter une entrée dans le tableau $errors correspondant au champ en erreur
		if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			$errors['email'] = 'Ton email est invalide';
		}
		if (empty($password)) {
			$errors['password'] = 'Ton password est vide';
		}

		if (empty($errors)) {

			$query = $db->query('SELECT id, firstname, lastname, password FROM user WHERE email = "'.$email.'"');
			$user = $query->fetch();

			if(empty($user)){
				$errors['account'] = 'Cet email n\'existe pas';
			}else{
				if (password_verify($password, $user['password'])) {

					$success = userLogin($user);

					if(!empty($remember)){

						setcookie('remember_me', http_build_query($_SESSION)."&date=".date("Y-m-d H:i:s"), strtotime("+1 week"));
					}

				} else {
					$errors['account'] =  'Le mot de passe est incorrect';
				}
			}
		}
	}
}


?>

		<h1>Connexion</h1>
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
			<?php }

			if($success === true){ ?>
				<div class="alert alert-success">Bienvenue <?= $user['firstname'].' '.$user['lastname'] ?></div>
				<script>setTimeout(function(){ location.href = "index.php";}, 3000)</script>

			<?php } else{ ?>
				<form class="form-login" method="POST" novalidate>

					<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?>" required autofocus>
					<br>
					<input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" value="<?= $password ?>" required>

					<div id="remember" class="checkbox">
						<label for="remember-me">
							<input type="checkbox" name="remember" id="remember-me" value="1"> Se souvenir de moi
						</label>
					</div>

					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>

				</form><!-- /form -->

				<a href="#" class="forgot-password">
					Mot de passe oublié ?
				</a>
			<?php } ?>


		</div><!-- /card-container -->


<?php require_once 'partials/footer.php' ?>