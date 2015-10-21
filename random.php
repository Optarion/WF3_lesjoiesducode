<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT author, content, creation_date FROM posts ORDER BY RAND() LIMIT 1');
	$post = $query->fetch();


?>

	<h1>Une Joie du code au hasard</h1>

	<hr>

	<div class="post">
	    <p><?= date("d/m/Y", strtotime($post['creation_date'])) ?> par <a href="#"><?= ucfirst($post['author']) ?></a></p>

	    <blockquote>
	      <p><?= nl2br($post['content']) ?></p>
	    </blockquote>
	</div>

<?php
	require_once 'partials/footer.php'
?>