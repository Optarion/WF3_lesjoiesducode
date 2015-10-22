<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT * FROM posts ORDER BY creation_date DESC');
	$posts = $query->fetchAll();
?>


<h1>Tous les JDC</h1><button class="btn"><a href="article_add.php">Add message</a></button>
<table class="table table-hover">
	<thead>
		<tr>
		<?php foreach($posts[0] as $column => $value) { ?>
			<th><?= ucfirst($column) ?></th>
		<?php } ?>
		</tr>
	</thead>

	<tbody>
		<?php foreach($posts as $post) { ?>
		<tr>
			<?php foreach($post as $data) { ?>
			<td><?= ucfirst($data) ?></td>
		<?php } ?>
		</tr>
		<?php } ?>
	</tbody>

</table>

<?php
	require_once 'partials/footer.php';
?>