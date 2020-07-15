<?php
include '../templates/head.html';
?>
<body>
<h1>Books</h1>
<div>
<p>
I like books.
<p>
I like stories.
<p>
I like to both read and make stories.
<p>
My written stories can be found <a href='/writings.php/'>here</a>.
A fun way to create stories is with the game <a href='/games/top.php#fiasco'>Fiasco</a>.
<p>
Beneath will be, one day, a list of my books; books I've read, books I recommend, books on my reading list and books I currently am reading.
However entering the entire of my library into a database would take too much effort. I'm looking into having text-recognition algorithm looking at my books and automate the data entry. So far it's going a bit so so. 
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
