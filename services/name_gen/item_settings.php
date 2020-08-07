<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require "$root/templates/head.html";
?>
<body>
<p>
Items are generated in the form of [name]'s [adjective] [noun].
	<form action='./generate_item.php' method='get'>
		<p>
			Length of name: <input 
			id='f_name_len' 
			type=number 
			min=0 
			value=6
			name='f_name_len'>
		</p>
		<p>
			Number of items to generate: <input 
			id='n_names' type=number min=1 value=1 max=32 name='n_names'>
		</p>
		<button>Generate Item(s)</button>
	</form>
</body>
<?php
require "$root/templates/footer.html";
?>
