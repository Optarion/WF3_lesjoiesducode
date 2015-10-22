<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT * FROM user ORDER BY created_date DESC');
	$users = $query->fetchAll();

	if(!empty($_GET['delete_user'])){

	}
?>


<h1>Tous les JDC</h1>
<table class="table table-hover">
	<thead>
		<tr>
		<th><i class="fa fa-pencil "></th>
		<th><i class="fa fa-trash-o "></i></th>
		<?php foreach($users[0] as $column => $value) {
			if($column != 'password'){ ?>
				<th><?= ucfirst($column) ?></th>
		<?php }
		} ?>
		</tr>
	</thead>

	<tbody>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><i class="fa fa-pencil "></i></td>
			<td><a href="user_add.php?action=delete&id=<?= $user['id'] ?>" class="delete_user"><i class="fa fa-trash-o "></i></a></td>
			<?php foreach($user as $data) {
				if($data != $user['password']){?>

				<td><?= ucfirst($data) ?></td>
				<?php }
		} ?>

		</tr>
		<?php } ?>
	</tbody>

</table>

<?php
	require_once 'partials/footer.php';
?>