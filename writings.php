<link href='global.css' rel='stylesheet' media='all'/>
<?php 
include 'utils/dir_handler.php' ?>
<body>
	<h1> Writings </h1>
	<p>
	All of my writings will be gathered here, including documents such as my CV.
	I like to write in my free time, and have decided to upload some of my stories.
	Some are finished and some are just drafts. 
	I figured that rather than never showing them I'll let anyone have a look.
	Any feedback is welcome. :)
	</p>
	<table class='dir'>
		<tr class='dir'>
			<th>Filename</th>
			<th>Size <small>(bytes)</small></th>
			<th>Last Modified</th>
		</tr>
<?php
	$files = get_files('writings');

	for($i = 0; $i < count($files); $i++)
	{
		print_file($files[$i]);
	}
?>
	</table>
<?php
	include 'templates/footer.html'
?>
</body>
