<?php
	require_once 'partials/head.php';

	$count_posts = 0;

	if(!empty($_GET)){
		$q = strip_tags($_GET['q']);

		$query = $db->prepare('SELECT author, content, creation_date FROM posts WHERE author LIKE :q OR content LIKE :q ORDER BY creation_date DESC');
		$query->bindValue('q', "%".$q."%");
		$query->execute();

		$posts = $query->fetchAll();

		$count_posts = count($posts);
	}
?>

	<h1><?= $count_posts ?> résultats pour la recherche "bla"</h1>

	<hr>

	<?php
	if(!empty($_GET)){
		foreach($posts as $post){ ?>
			<div class="post">
			    <p><?= date("d/m/Y", strtotime($post['creation_date'])) ?> par <a href="#"><?= ucfirst($post['author']) ?></a></p>

			    <blockquote>
			      <p><?= cutstring($post['content'], 100) ?></p>
			    </blockquote>
			</div>
		<?php }
	} ?>


<?php
	require_once 'partials/footer.php'
?>