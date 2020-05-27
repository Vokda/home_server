<?php
include '../templates/head.html';
?>
<body>
<h1>My Projects</h1>
<div>
<p>
Here you can find some of my projects. 
Some are completed, some are a work in progress and some can be built on forever. 
Either way I feel like they deserve a slightly longer descritpion.
The code for each project can be found on <a href='https://github.com/Vokda'>github</a>.
</p>
When a projects is mature enough to be viewed by the world I'll post it here as well as the code on github.
Occasionally I'll discover some old code in a 
<div class='tooltip'>
tarball 
	<span class='tt_text'>
		(compressed file; related funny 
		<a href='https://imgs.xkcd.com/comics/tar.png'><b>picture</b></a>
		)</span>
</div>
of old projects and code snippets and put it here, perhaps even upload the code.

<p>
If you would like to look at the code itself have a look at my <a href='https://github.com/Vokda'>github</a>.
</p>
<p>
Some of my programs are/will be available via this website <a href='../services/top.php'>here</a>.
</p>
<div>
<h2>Project List</h2>
<i style='font-size:small'>This list is incomplete; I can help by expanding it.</i>

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/utils/topper.php";
$html_files = make_collapsibles_from("projects/content", 'html');

include "$root/templates/footer.html" 
?>

</body>
