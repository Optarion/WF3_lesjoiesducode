<?php


	//Page active
	$current_page = basename($_SERVER['PHP_SELF']);

	$root_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['PHP_SELF']));
	$root_path = ltrim($root_path, '/');

	$root_path = substr($root_path, 0, strpos($root_path, '/'));
	$root_path = '/'.$root_path.'/admin-v2';

	$http_path = 'http://'.$_SERVER['HTTP_HOST'].$root_path;

	//Time courant
	$current_time = strtotime('now');


// MAILBOX
	//List des folders de Mailbox
	$mailbox_folders = array(
	  array(
	      'page_name' => 'inbox',
	      'url' => '',
	      'icon' => 'fa-inbox',
	      'color' => 'primary'
	    ),
	   array(
	      'page_name' => 'sent',
	      'url' => '?folder=sent',
	      'icon' => 'fa-envelope-o',
	      'color' => 'none'
	    ),
	   array(
	      'page_name' => 'drafts',
	      'url' => '?folder=drafts',
	      'icon' => 'fa-file-text-o',
	      'color' => 'danger'
	    ),
	   array(
	      'page_name' => 'junk',
	      'url' => '',
	      'icon' => 'fa-file-text-o',
	      'color' => 'danger'
	    ),
	  array(
	      'page_name' => 'trash',
	      'url' => '?folder=trash',
	      'icon' => 'fa-trash-o',
	      'color' => 'info'
	    ),
	);



