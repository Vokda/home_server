<?php
include '../templates/head.html';
?>
<body>
<h1>Games</h1>
<div>
<p>
Games! All about games here! Be it board games, video games or other kinds of games.
</p>
</div>

<?php 
// do the collapsibles
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/utils/topper.php";
make_collapsibles_from('games/content');

include "$root/templates/footer.html" 
?>

</body>
