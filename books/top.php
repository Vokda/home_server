<?php
include '../templates/head.html';
?>
<body>
<h1>Books</h1>
<div>
<p>
I like books.
I like stories.
I like to both read and make stories.
My written stories can be found <a href='/writings.php/'>here</a>.
A fun way to create stories is with the game <a href='/games/top.php#fiasco'>Fiasco</a>.
Beneath will be, one day, a list of my books; books I've read, books I recommend, books on my reading list and books I currently am reading.
</p>
</div>

<?php 
// do the collapsibles
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/utils/topper.php";
make_collapsibles_from('books/content', 'html');

include "$root/templates/footer.html" 
?>

</body>
