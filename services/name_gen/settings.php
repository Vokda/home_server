<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require "$root/templates/head.html";
?>
<body>
	<form action='./generate_name.php' method='get'>
		<p>
			Length of first name: <input 
			id='f_name_len' 
			type=number 
			min=0 
			value=6
			name='f_name_len'>
		</p>
		<p>
			Length of last name: <input 
			id='l_name_len' type=number min=0 value=6 name='l_name_len'>
		</p>
		<p>
			Number of names to generate: <input 
			id='n_names' type=number min=1 value=1 max=32 name='n_names'>
		</p>
		<button>Generate Name</button>
	</form>
</body>
<?php
require "$root/templates/footer.html";
?>
