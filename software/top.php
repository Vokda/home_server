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

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/utils/topper.php";
make_collapsibles_from('software/content', 'html');
include "$root/templates/footer.html" 
?>

</body>
