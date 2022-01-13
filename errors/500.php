<html>
<?php
include '../templates/header.html';
?>
<body>
	<h1>
		ERROR 500
	</h1>
	<p>Internal server error!</p>
<?php
$r = rand(1, 2);
$image = "500_$r.jpg";
	echo"<img src=/errors/$image alt='some 500 related meme'>"
?>
</body>
<?php
include '../templates/footer.html';
?>
</html>
