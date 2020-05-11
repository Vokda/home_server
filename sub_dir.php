<link href='global.css' rel='stylesheet' media='all'/>
<?php 
include 'dir_handler.php';
$sub_dir =  $_GET['sub_dir']
?> 
<body>
<?php 
	$title = ucfirst(basename($sub_dir));
	echo "<h1> $title </h1>"; 
?>

	<table>
		<tr>
			<th>Filename</th>
			<th>Size <small>(bytes)</small></th>
			<th>Last Modified</th>
		</tr>
<?php
$files = get_files($sub_dir);
for($i = 0; $i < count($files); $i++)
{
	print_file($files[$i]);
}
?>
	</table>
</body>
