<?php
	require_once '../config/config.php';
	require_once 'Textmessage.php';
	$pullText = new Textmessage();
	echo $pullText::fetchAllRowAllMsg($DBcon, 9000);
	unset($pullText);
?>