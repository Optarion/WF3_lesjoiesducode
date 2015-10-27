<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT * FROM posts ORDER BY creation_date DESC');
	$posts = $query->fetchAll();

	$count_posts = $query->ROWCOUNT();
?>


<h1>Tous les JDC (<?= $count_posts ?> messages)</h1><button class="btn"><a href="article_action.php">Add message</a></button>
<table class="table table-hover">
	<thead>
		<tr>
		<th><span class="glyphicon glyphicon-pencil"></span></th>
		<th><span class="glyphicon glyphicon-trash"></span></th>
		<?php foreach($posts[0] as $column => $value) { ?>
			<th><?= ucfirst($column) ?></th>
		<?php } ?>
		</tr>
	</thead>

	<tbody>
		<?php foreach($posts as $post) { ?>
		<tr>
			<td><a href="article_action.php?action=update&id=<?= $post['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="article_action.php?action=delete&id=<?= $post['id'] ?>" class="delete_item"><span class="glyphicon glyphicon-trash"></span></a></td>
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