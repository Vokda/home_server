<?php
include '../templates/head.html';
require '../dir_handler.php';
?>
<link href='gallery.css' rel='stylesheet' media='all'/>
<body>
<h1>
	Gallery
</h1>
<div class='overview'> <!-- overview -->
<p>
Click on any of the images to get a large picture
</p>
<?php
$img_files = get_files('pics');
foreach($img_files as $file)
{
	$path_info = pathinfo($file[0]);
	$path_info['filename'];

	echo '<div class=overview_img>';
	$src = " src='".$file[0]."'";
	$alt;
	$desc;
	echo "<img";
	echo $src;
	echo $alt;
	echo "/img>";
	echo $desc;
	echo '</div>';
}
?>
</div>

<!-- zoomed in content -->
<!--
<div>
</div>
<div class=gallery>
	<img 
	 src="pics/sc4_first_generated_map.png" 
	 alt="First sc4 generated map" >
	 <div class=desc>
		 Terrain generated with my <a href='https://github.com/Vokda/sc4_region_generator'>Simcity4 terrain generator</a>.
	 </div>
</div>

<div class=gallery>
	<img src="pics/trump_tweet_examples.png" alt="generated tweets">
	Here is a list of examples of tweets generated with a <a href='https://github.com/Vokda/trump_tweeter'>markov chain based on Trump's tweets</a>
</div>
-->

More images to come soon...!
</body>
