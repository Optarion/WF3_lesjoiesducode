<?php
	require_once 'partials/head.php';

	$query = $db->query('SELECT COUNT(id) as count_posts FROM posts');
	$count_posts = $query->fetch();
	$count_posts = $count_posts['count_posts'];

	$query = $db->query('SELECT COUNT(id) as count_users FROM user');
	$count_users = $query->fetch();
	$count_users = $count_users['count_users'];

	$query = $db->query('SELECT author, content, creation_date FROM posts ORDER BY creation_date DESC LIMIT 5');
	$last_five_posts = $query->fetchAll();

	$query = $db->query('SELECT firstname, lastname, created_date FROM user ORDER BY created_date DESC LIMIT 5');
	$last_five_users = $query->fetchAll();

?>


	<h1 class="page-header">Tableau de bord</h1>

	<div class="row placeholders">
		<div class="col-xs-6 col-sm-3 placeholder">
			<img data-src="holder.js/200x200/auto/sky/text:<?= $count_posts ?> \n JDC" class="img-responsive" alt="Generic placeholder thumbnail">
			<h4>Nombre de JDC</h4>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
			<img data-src="holder.js/200x200/auto/vine/text:<?= $count_users ?> \n inscriptions" class="img-responsive" alt="Generic placeholder thumbnail">
			<h4>Nombre d'inscriptions</h4>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
			<img data-src="holder.js/200x200/auto/social/text:42 \n commentaires" class="img-responsive" alt="Generic placeholder thumbnail">
			<h4>Nombre de commentaires</h4>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
			<img data-src="holder.js/200x200/auto/#5bc0de:#fff/text:18 \n messages" class="img-responsive" alt="Generic placeholder thumbnail">
			<h4>Nombre de messages</h4>
		</div>
	</div>

	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title">Dernières JDC</h3>
		</div>
		<div class="list-group">
			<?php foreach($last_five_posts as $post){ ?>
				<a href="#" class="list-group-item">
					<h4 class="list-group-item-heading"><?= $post['author'] ?> (<?= date("Y/m/d", strtotime($post['creation_date'])) ?>)</h4>
					<p class="list-group-item-text"><?= $post['content'] ?></p>
				</a>
			<?php } ?>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Dernières inscriptions</h3>
		</div>
		<div class="list-group">
			<?php foreach($last_five_users as $user){ ?>
				<a href="#" class="list-group-item">
					<h4 class="list-group-item-heading"><?= $user['firstname'].' '.$user['lastname'] ?> (<?= date("Y/m/d", strtotime($user['created_date'])) ?>)</h4>
				</a>
			<?php } ?>
		</div>
	</div>

<?php
	require_once 'partials/footer.php';
?>