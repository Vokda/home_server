<style>
/* styles for wide buttons in collapsibles */
.content_wide_button
{
	display: grid;
	grid-template-columns: 100%;
}
</style>
<script type='text/javascript' src='/utils/collapsible.js'></script>
<?php
require 'dir_handler.php';
require 'buttoner.php';

$root = $_SERVER['DOCUMENT_ROOT'];
chdir($root);

function make_collapsibles_from($dir, $type = null)
{
	$content_files = get_files($dir);
	for($i = 0; $i < count($content_files); $i++)
	{
		$item = $content_files[$i][0];
		// if a type is given only use those files
		// OR
		// if no type is set use all files found
		if(isset($type) and strpos($item, $type))
		{
			$button_name = basename($item, ".$type");
			$button_name = preg_replace('/_/', ' ', $button_name);
			$button_name = ucwords($button_name);
			make_collapsible($item, $i, $button_name);
		}
		elseif(!isset($type))
		{
			$button_name = preg_replace('/\..+/', '', $button_name);
			$button_name = preg_replace('/_/', ' ', $button_name);
			$button_name = ucwords($button_name);
			make_collapsible($item, $i, $button_name);
		}
	}
}

// makes a collapsible framed section.
// needs a path and an ID
function make_collapsible($file, $i, $button_name)
{
	echo "<fieldset>";
	$button = ["<button type='button' class='collapsible$i content_wide_button' onclick=collapse($i)>$button_name</button>"];
	make_button_grid($button);
	echo "<div class='content' id='content$i' style='display:none;'>";
	include $file;
	echo "</div>";
	echo '</fieldset>';
}
?>
