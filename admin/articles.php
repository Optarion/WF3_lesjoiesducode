<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT * FROM posts ORDER BY creation_date DESC');
	$posts = $query->fetchAll();

	$count_posts = $query->ROWCOUNT();
?>


<h1>Tous les JDC (<?= $count_posts ?> messages)</h1><button class="btn"><a href="article_add.php">Add message</a></button>
<table class="table table-hover">
	<thead>
		<tr>
		<th><i class="fa fa-pencil "></th>
		<th><i class="fa fa-trash-o "></i></th>
		<?php foreach($posts[0] as $column => $value) { ?>
			<th><?= ucfirst($column) ?></th>
		<?php } ?>
		</tr>
	</thead>

	<tbody>
		<?php foreach($posts as $post) { ?>
		<tr>
			<td><a href="article_add.php?action=update&id=<?= $post['id'] ?>"><i class="fa fa-pencil "></i></a></td>
			<td><a href="article_add.php?action=delete&id=<?= $post['id'] ?>" class="delete_user"><i class="fa fa-trash-o "></i></a></td>
			<?php foreach($post as $data) { ?>
				<td><?= ucfirst($data) ?></td>
		<?php } ?>
		</tr
>		<?php } ?>
	</tbody>

</table>

<?php
	require_once 'partials/footer.php';
?>