<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT * FROM user ORDER BY created_date DESC');
	$users = $query->fetchAll();

	$count_users = $query->ROWCOUNT();

?>


<h1>Tous les Users (<?= $count_users ?> users)</h1>
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
			<td><a href="user_add.php?action=update&id=<?= $user['id'] ?>"><i class="fa fa-pencil "></i></a></td>
			<td><a href="user_add.php?action=delete&id=<?= $user['id'] ?>" class="delete_item"><i class="fa fa-trash-o "></i></a></td>
			<?php foreach($user as $data) {
				if($data != $user['password']){?>

				<td><?= $data == $user['email'] ? $data : ucfirst($data) ?></td>
				<?php }
		} ?>

		</tr>
		<?php } ?>
	</tbody>

</table>

<?php
	require_once 'partials/footer.php';
?>