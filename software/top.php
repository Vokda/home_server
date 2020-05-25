<?php
include '../templates/head.html';
?>
<script type='text/javascript' src='/utils/collapsible.js'></script>
<body>
<h1>Software Related</h1>
<div>
	<p>
	On this page you can find links to all kinds of software related 
	stuff that I find interesting for one reason or another.
	Software I've made can be found <a href=/projects/top.php>here</a>.
	</p>
</div>

<div>
<ul>

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/utils/dir_handler.php";
$html_files = get_files("software");
$i = 0;
foreach ($html_files as &$item)
{
	if(strpos($item[0], 'html'))
	{
		$button_name = basename($item[0], '.html');
		$button_name = preg_replace('/_/', ' ', $button_name);
		$button_name = ucwords($button_name);
		echo '<li>';
		echo "<fieldset>";
		echo "<button type='button' class='collapsible$i'";
		echo" onclick=collapse($i)>$button_name</button>";
		echo "<div class='content' id='content$i' style='display:none;'>";
		include $item[0];
		echo '</div>';
		echo '</fieldset>';
		echo '</li>';
		$i++;
	}
}
#include 'name_generator.html';
?>

</ul>

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include "$root/templates/footer.html" 
?>

</body>
