<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require "$root/templates/head.html";
?>
<body>
	<form action='./generate_name.php' method='get'>
		<p>
			Enter length of first name: <input 
			id='f_name_len' 
			type=number 
			min=0 
			value=5
			name='f_name_len'>
		</p>
		<p>
			Enter length of last name: <input 
			id='l_name_len' type=number min=0 value=5 name='l_name_len'>
		</p>
		<button>post</button>
	</form>
</body>
<?php
require "$root/templates/footer.html";
?>
