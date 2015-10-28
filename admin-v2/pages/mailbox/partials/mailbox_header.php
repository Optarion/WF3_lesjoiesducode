      <h1>
        Mailbox
        <small><?= $count_unread_inbox ?> new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
        <?php
          if($current_page == 'compose.php'){
            echo '<a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>';
          }else{
            echo '<a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>';
          }

          include_once 'partials/mailbox_folders.php';
          /* include_once 'partials/mailbox_labels.php'; */
          ?>
        </div>