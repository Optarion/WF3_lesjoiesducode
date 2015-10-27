<?php

require_once 'partials/head.php';

if(!empty($_POST)){
	$query = $db->prepare('UPDATE user SET firstname = :firstname, lastname = :lastname, gender = :gender, email = :email, newsletter = :newsletter, account_type = :account_type, modified_date = NOW() WHERE id = :id');
	$query->bindValue('id', $_GET['id'], PDO::PARAM_INT);
	$query->bindValue('firstname', $_POST['firstname']);
	$query->bindValue('lastname', $_POST['lastname']);
	$query->bindValue('gender', $_POST['gender'], PDO::PARAM_INT);
	$query->bindValue('email', $_POST['email']);
	$query->bindValue('newsletter', $_POST['newsletter'], PDO::PARAM_INT);
	$query->bindValue('account_type', $_POST['account_type'], PDO::PARAM_INT);
	$query->execute();


}

if($_GET['action'] == 'delete'){
	$query = $db->query('DELETE FROM user WHERE id = '.$_GET['id'].'');

	if(true){
		echo 'User deleted';

		header('refresh:3, url=users.php');
		exit();
	}
}

if($_GET['action'] == 'update'){
	$query = $db->query('SELECT * FROM user WHERE id = '.$_GET['id'].'');
	$user = $query->fetch();

	echo debug($user);

	$firstname = $user['firstname'];
	$lastname = $user['lastname'];
	$gender = $user['gender'];
	$email = $user['email'];
	$newsletter = $user['newsletter'];
	$account_type = $user['account_type'];


?>

	<h1>Update user <?= $firstname.' '.$lastname.' (id= '.$_GET['id'].')' ?></h1>
	<hr>

	<form method="POST" class="form-update" novalidate>

		<div class="form-group">
			<label for="firstname">Prénom</label>
			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Votre prénom" value="<?= $firstname ?>" autofocus>
		</div>

		<div class="form-group">
			<label for="lastname">Nom</label>
			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" value="<?= $lastname ?>">
		</div>

		<div class="form-group">
			<label for="gender">Gender</label>
			<select name="gender" id="gender">
				<?php foreach($genders as $gender_label => $gender_value){
					$selected = '';
					if ($gender_label == $gender){
						$checked = ' selected';
					}?>
					<option value="<?= $gender_label ?>"<?= $selected ?>><?= $gender_value ?></option>
				<?php }?>
			</select>
		</div>

		<div class="form-group">
			<label for="email">Adresse email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Un email valide" value="<?= $email ?>">
		</div>

		<div class="form-group">
			<label for="newsletter">Newsletter</label>
			<select name="newsletter" id="newsletter">
				<option value="0"<?= $newsletter == 0 ? ' selected' : ''?>>No</option>
				<option value="1"<?= $newsletter == 1 ? ' selected' : ''?>>Yes</option>
			</select>
		</div>

		<div class="form-group">
			<label for="account_type">Account Type</label>
			<select name="account_type" id="account_type">
				<option value="1"<?= $account_type == 1 ? ' selected' : '' ?>>User</option>
				<option value="2"<?= $account_type == 2 ? ' selected' : '' ?>>Writer</option>
				<option value="3"<?= $account_type == 3 ? ' selected' : '' ?>>Admin</option>
			</select>
		</div>

		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Update</button>

	</form><!-- /form -->
<?php } ?>

<?php
require_once 'partials/footer.php';
?>