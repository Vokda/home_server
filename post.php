<?php
	shell_exec("empty_thread.sh");
	$text = $_POST['post']; 
	$thread_file = fopen('forum.thread', 'a') or die ("could not write to forum.thread");
	fwrite($thread_file, "anonymous:$text\n");

	header("Location: forum.php");
?>
