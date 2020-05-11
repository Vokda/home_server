<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<link href='global.css' rel='stylesheet' media='all'/>
<head>
	<h1>
		Forum test
	</h1>
	<p>
	This is test forum. It is anonymous. Feel free to write something.
	The forum will be reset every 10 minutes.
	</p>
</head>

<?php
	function get_thread()
	{
		$thread_file = fopen('forum.thread', 'r') or die("could not open file forum.thread");
		$id=0;
		while(!feof($thread_file))
		{
			$line = fgets($thread_file);
			preg_match( '/(.+):((.+)+)/', $line, $matches );
			$posts[$id++] = $matches[1] . ' : ' . $matches[2];
		}
		for($i = $id-2; $i >= 0; $i--)
		{
			echo "<p>";
			echo $posts[$i];
			echo "</p>";
		}
		fclose($thread_file);
	}
?>

<body>
	<p>
		Post something! :)
	</p>

	<p>
		<form action='post.php', method='post'>
		<input name='post'></input>
		<button>post</button>
		</form>
		<?php get_thread() ?>
	</p>
</body>
</html>
