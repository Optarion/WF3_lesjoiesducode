<?php

$query = $db->prepare('SELECT COUNT(id) AS count_unread_trash FROM mailbox WHERE is_read = 0 AND  send_to = :id AND is_trash = 1');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$count_unread_trash = $query->fetch();
$count_unread_trash = $count_unread_trash['count_unread_trash'];

/*  TO DO = function qui prend un tableau de bindings et contruit la requête

  $bindings = array(
  'is_read' => 0,
  'send_from' => $id,
  'is_draft' => 1
);

foreach($bindings as $key => $value) {
  $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
  $query->bindValue($key, $value, $type);
}*/


$query = $db->prepare('SELECT COUNT(id) AS count_unread_draft FROM mailbox WHERE is_read = 0 AND send_from = :id AND is_draft = 1');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$count_unread_drafts = $query->fetch();
$count_unread_drafts = $count_unread_drafts['count_unread_draft'];
?>

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Folders</h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <?php




?>

  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <?php foreach($mailbox_folders as $folder){ ?>
        <li<?= basename($_SERVER['REQUEST_URI']) == 'mailbox.php'.$folder['url'] ? ' class="active"' : '' ?>><a href="mailbox.php<?= $folder['url'] ?>"><i class="fa <?= $folder['page_name'] ?>"></i> <?= ucfirst($folder['page_name']);

        if($folder['page_name'] != 'sent' && $folder['page_name'] != 'junk'){ ?>
          <span class="label label-<?= $folder['color'] ?> pull-right"><?= ${'count_unread_'.$folder['page_name']} ?></span></a></li>
      <?php }
      } ?>
    </ul>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->