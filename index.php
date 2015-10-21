<?php
	require_once 'partials/head.php';

	$page_active = !empty($_GET['p']) ? intval($_GET['p']) : 1;
	if($page_active == 0){
		$page_active = 1;
	}

	$query = $db->query('SELECT COUNT(id) as total_posts FROM posts');
	$nb_items = $query->fetch();

	$nb_items_per_page = 10;

	$nb_pages = ceil($nb_items['total_posts'] / $nb_items_per_page);

	$query = $db->prepare('SELECT id, author, content, creation_date FROM posts ORDER BY creation_date DESC LIMIT :start, :nb_items');
	$query->bindValue('start', $nb_items_per_page * ($page_active-1), PDO::PARAM_INT);
	$query->bindValue('nb_items', $nb_items_per_page, PDO::PARAM_INT);
	$query->execute();
	$posts = $query->fetchAll();

?>
		<h1>Les dernières Joies du code</h1>

		<hr>
		<ul class="pagination">
		<?php
			include 'partials/pagination.php';
		?></ul>
		<?php
		foreach($posts as $post){ ?>
			<div class="post">

			    <blockquote>
			      <p><a href="article.php?id=<?= $post['id'] ?>"><?= cutstring($post['content'], 100) ?></a></p>
			    </blockquote>

			    <p style="text-align: right"><?= date("d/m/Y", strtotime($post['creation_date'])) ?> par <a href="#"><?= ucfirst($post['author']) ?></a></p>
			</div>
		<?php } ?>
		<ul class="pagination">
		<?php
			include 'partials/pagination.php';
		?></ul>


<?php
	require_once 'partials/footer.php'
?>