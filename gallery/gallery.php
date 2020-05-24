<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include "$root/templates/head.html";
require "$root/utils/dir_handler.php";
?>
<link href='gallery.css' rel='stylesheet' media='all'/>
<script type='text/javascript' src='gallery.js'></script>
<body>
<h1>
	Gallery
</h1>

<!--div class='overview'--> 
<p>
Click on any of the images to get a large picture.
The layout is a bit wonky at the moment, but all images should be viewable.
</p>
<?php
$cwd = getcwd();
$img_files = get_files("$cwd/pics/");
foreach($img_files as $file)
{
	$path_info = pathinfo($file[0]);

	# fix with desc
	$desc_file_name = $cwd.'/descs/'.$path_info['filename'].'.txt';
	$desc_file = fopen($desc_file_name, "r");
	$desc_content = fread($desc_file,1000);
	$matches = [];
	preg_match('/^desc=(.+)(\nalt=(.+))?$/', $desc_content, $matches);

	$file_name = $path_info['basename'];
	echo '<div class=overview_img>';
	$src = " src='pics/".$file_name."'";

	$alt = '';
	if (count($matches) == 3)
	{
		$alt = $matches[2];
	}
	$desc = $matches[1];

	// actual image tag
	echo "<img";
	echo $src;
	//echo "$alt";
	echo "onclick='expand_image(this);'";
	echo "/img>";
	echo $desc;

	echo '</div>';
}
?>
<!--/div-->
<!-- zoomed in content -->
<div class='container'>
	<!-- close image -->
	<span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	<!-- expanded image -->
	<img id='expanded_img'>
	<!-- image desc -->
	<div id='img_desc'></div>
	<div class='footer'>
	<?php
	include "$root/templates/footer.html";
	?>
	</div>
</div>
</body>
