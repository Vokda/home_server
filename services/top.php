<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include '../templates/head.html';
require "$root/utils/buttoner.php";
?>
<body>
<h1>Services</h1>
<div>
	Here you can find online services my website provide.
<?php
	$buttons = array(
		make_button('Name Generator', 'name_gen/name_settings.php', false),
		make_button('Item Generator', 'name_gen/item_settings.php', false)
	);
	
	make_button_list($buttons);
?>
</div>
<?php
	include "$root/templates/footer.html";
?>
</body>
